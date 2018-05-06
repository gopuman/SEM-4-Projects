#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "intal.h"

void* intal_create(const char* str)
{	if(str[0]=='-') return NULL;
	int *a = (int*) malloc(sizeof(int) * 10000); 
	int n = 9999;
	for(n = 0; str[n] != '\0';)
		n++;
	n--;

	int j = 10000;
	for(int i = n; str[i] != '\0'; i--)
		{if(str[i] - '0'>9 ||str[i] - '0'<0) continue;
		 a[j] = str[i] - '0'; 
		
		 j--;
		}
	return a;
}

void intal_destroy(void* intal)
{	if(!intal)	return;
	free(intal);
}

char* intal2str(void* intal)
{	if(!intal)	return "NaN";
	char *str = (char*) malloc(sizeof(char) * 10000);
	for ( int i = 0; i <= 10000; i++)
		{str[i] = *(int*)(intal+(i*sizeof(int))) + '0';
}
	int i;
	for(i = 0; str[i] == '0';)
		i++;
	if(i > 10000)	return "0";
	return str+i;
}


void* intal_add(void* intal1, void* intal2)
{	if(!intal1)	return NULL;
	if(!intal2)	return NULL;	
	int carry =0;
	int *str = (int*) malloc (sizeof(int) *10000); 
	for(int i = 10000; i >= 0; i--)
	{	
		int temp = (*(int*)(intal1+(i*sizeof(int)))) + (*(int*)(intal2+(i*sizeof(int)))) +carry;
		if(temp>9){
			temp = temp%10;
			carry = 1;
			}
		else{
			carry = 0;
			}
		str[i] = temp;
	}
	return str;	 
}



void* intal_diff(void* intal1, void* intal2)
{	if(!intal1)	return NULL;
	if(!intal2)	return NULL;
	void* big = (int*) malloc(sizeof(int) * 10000);
	void* small = (int*) malloc(sizeof(int) * 10000);
	int *str = (int*) malloc (sizeof(int) *10000);
	for(int i = 0; i <= 10000; i++)
	{
		if(!(*(int*)(intal1+(i*sizeof(int)))) && (*(int*)(intal2+(i*sizeof(int)))))
			{big = intal2; small = intal1; break;}

		if((*(int*)(intal1+(i*sizeof(int)))) && !(*(int*)(intal2+(i*sizeof(int)))))
			{big = intal1; small=intal2; break;}

		if((*(int*)(intal1+(i*sizeof(int)))) && (*(int*)(intal2+(i*sizeof(int)))))
			{ int ans = strcmp(intal2str(intal1), intal2str(intal2));
			  if(ans>0) {big = intal1; small = intal2;}
			  if(ans<0) {big = intal2; small = intal1;}				
			  if(ans==0) return intal_create("0");
			  break;
			}
	} 
	int borrow = 0;
	for(int i = 10000; i >= 0; i--)
	{	int temp1 = *(int*)(big+(i*sizeof(int)));
		int temp2 = *(int*)(small+(i*sizeof(int)));
		if(temp1 < temp2+borrow)
		{
			temp1 += 10;
			str[i] = temp1 - temp2 - borrow;
			borrow = 1;
		}
		else 
		{
			str[i] = temp1 - temp2 - borrow;
			borrow = 0;
		}
		
	}
	return str;
}

void* intal_increment(void* intal)
{		if(!intal)	return NULL;
	return intal_add(intal, intal_create("1"));
}

void* intal_decrement(void* intal)
{		if(!intal)	return NULL;
	if (!strcmp(intal2str(intal), "0")) return "0";
	return intal_diff(intal, intal_create("1"));
}

void* intal_multiply(void* intal1, void* intal2)	
{	if(!intal1)	return NULL;
	if(!intal2)	return NULL;
	if (!strcmp(intal2str(intal1), "1"))
		return intal2;
	if (!strcmp(intal2str(intal2), "1"))
		return intal1;
	char *str1 = intal2str(intal1);
	char *str2 = intal2str(intal2);
	int m = strlen(str1);
	int n = strlen(str2);
	char *temp = (char*) malloc(sizeof(char) * (m+n+1));
	char *added = (char*) malloc(sizeof(char) * (m+n+1));
	for (int ii = 0; ii < m+n; ++ii)
		added[ii] = '0';
	
	int k = 0;
	int t1;
	for (int i = n-1; i >= 0 ; --i)
	{	int carry = 0;
		for(int l = n+m; l > n+m-k; --l)
			temp[l] = '0';
		int j;	
		for (j = m-1; j >= 0; --j)
		{	
			int t= (str2[i]-'0') * (str1[j]-'0') + carry;
			carry = 0;
			if(t > 9)
			{
				t1 = t%10;
				temp[n-k+j+1] = t1 + '0';
				carry = t/10;
			}
			else
				temp[n-k+j+1] = t + '0';
		} 

		temp[n-k+j+1] = carry + '0';
		for(int r = n-k+j+1-1; r >= 0; r--)
			temp[r] = '0';
		added = intal2str(intal_add(intal_create(added),intal_create(temp)));
		k++;
	}
	free(temp);
	return intal_create(added);
}

void* intal_divide(void* intal1, void* intal2)
{	if(!intal1)	return NULL;
	if(!intal2)	return NULL;
	if (!strcmp(intal2str(intal2), "1"))
		return intal1;	
	if (!strcmp(intal2str(intal2), "0"))
		return NULL;
	if (!strcmp(intal2str(intal1), "0"))
		return intal_create("0");
	if (!intal_compare(intal1, intal2))
		return intal_create("1");
	if (-1==intal_compare(intal1, intal2))
		return intal_create("0");


	char *intal11 = intal2str(intal1);
	char *intal22 = intal2str(intal2);
	char *partintal1 = (char*)malloc(sizeof(char*) * strlen(intal22));
	partintal1[0] = intal11[0];
	int i = 0;
	char *result;
	char *res = (char*)malloc(sizeof(char) * strlen(intal11));
	
	int count = 0;
	while(intal_compare(intal_create(partintal1), intal2) == -1)
	{
		i++;
		partintal1[i] = intal11[i];
	}
	partintal1 = realloc(partintal1, sizeof(partintal1)+sizeof(char));
	int index=0, length=1;
	while(i < strlen(intal11))
	{
		while(intal_compare(intal_create(partintal1), intal2) >= 0)
		{	
			strcpy(partintal1, intal2str(intal_diff(intal_create(partintal1), intal2)));	
			count++;
		}

		result = (char*)malloc(sizeof(char));
		result[index] = count + '0';
		strcat(res, intal2str(intal_create(result)));
		count = 0;
		strcpy(partintal1, intal2str(intal_create(partintal1)));
		int j = strlen(partintal1) - 1;

		if(!intal11[i+1])	break;

		while(intal_compare(intal_create(partintal1), intal2) == -1)
		{	j++; i++; 
			partintal1[j] = intal11[i];
			break;
		}
	}
	free(partintal1);
	free(result);
	return intal_create(res);
}
int intal_compare(void* intal1, void* intal2)
{		if(!intal1)	return -2;
	if(!intal2)	return -2;
	for(int i = 0; i <= 10000; i++)
	{
		if(!(*(int*)(intal1+(i*sizeof(int)))) && (*(int*)(intal2+(i*sizeof(int)))))
			return -1;

		if((*(int*)(intal1+(i*sizeof(int)))) && !(*(int*)(intal2+(i*sizeof(int)))))
			return 1;

		if((*(int*)(intal1+(i*sizeof(int)))) && (*(int*)(intal2+(i*sizeof(int)))))
		{   int ans = strcmp(intal2str(intal1), intal2str(intal2));
			if(ans>0) return 1;
			if(ans<0) return -1;				
	    	if(ans==0) return 0;
	    	break;
		}
	}
}

void *intal_pow(void* intal1, void* intal2)
{		if(!intal1)	return NULL;
	if(!intal2)	return NULL;
	if(intal2str(intal2) == "0")	
		return intal_create("1");
	
	void *P = intal_pow(intal1, intal_divide(intal2, intal_create("2")));
	P = intal_multiply(P, P);
	char *temp = intal2str(intal2);
	if(temp[strlen(temp)-1] == '1' || temp[strlen(temp)-1] == '3' || temp[strlen(temp)-1] == '5' || temp[strlen(temp)-1] == '7' || temp[strlen(temp)-1] == '9')	
		P = intal_multiply(P, intal1);
	return P;
}