#include <math.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "intal.h"


typedef struct intal
{
	char *data;
	int length;
}intal;

int max(long int x, long int y)
{
	if(x>y)
		return x;
	else
		return y;
}

char* removezeroes(char*x)  //Function to remove preceeding zeroes before returning the intal (for eg.000001 should be 1)
{

	int i;
	int count = 0;
	int n = strlen(x);
	for(i=0;i<n;i++)
	{
		if(x[i] == '0')
			count++;
		else
			break;	
		}
	if(count == 0)
		return x;
	else
	{
		char *y = (char*)malloc(n-count);
		for(i=0;i<(n-count);i++)
		{
			y[i] = x[i+count];
		}
		return y;
	}

}

void* intal_create(const char* str)  //Creating the intal. Intializing the data and length
{	
	int j;
	for(j=0;j<strlen(str);j++)
	{
		if(str[j]<'0' || str[j]>'9')
		{
			return NULL;
		}
	}
	if(strlen(str)=='1' && str[0]=='0')
	{
		return NULL;
	}
	intal *i;
	i = (intal*)malloc(sizeof(intal));
	i->data = (char*)malloc(strlen(str)+1);
	strcpy(i->data,str);
	i->length = strlen(str);
	return i;	
}

char* intal2str(void* temp)    //Converting the intal into string to use in the printf function
{
	intal* x = (intal*)temp;
	if(x==NULL)
	{
		char* y = (char*)malloc(4*(sizeof(char)));
		y[0] = '0';
		y[1] = '\0';
		return y;
	}
	char* new = (char*)malloc(sizeof(char)*x->length);
	int i;
	for(i=0;i<x->length;i++)
	{
		new[i] = x->data[i];
	}
	new[x->length] = '\0'; 
	return new;
}


void intal_destroy(void* temp)  //Freeing the intal created
{
	intal *number;
	number = (intal *)temp;
	if(number==NULL)
		return;
	if(number->data!=NULL)
		free(number->data);
	free(number);
}

void* intal_increment(void* temp)
{
	int i;int s = 0;
	intal* a = (intal*)temp;
	if(a==NULL)
		return NULL;
	int n = a->length;
	char* x = (char*)a->data;
	
	if(x[n-1] == '9')				//Case when the units place is a 9.
	{
		x[n-1] = '0';
		for(i=n-2;i>=0;i--)
		{
			if(x[i] == '9')			//Replacing all preceeding 9's with a 0
				{
					x[i] = '0';
					s++;
				}
			else
				break;
		}
		if(s == (n-1)) 				//If the number contains all 9's, we have to increase the length by 1.(eg. 99 + 1 = 100)
		{
			intal* new = (intal*)malloc(sizeof(intal));
			new->data = (char*)malloc(n+1);
			new->length = n+1;
			char* newdat = new->data;
			newdat[0] = '1';
			for(i=1;i<n+1;i++)
			{
				newdat[i] = '0';
			}
			new->data = removezeroes(newdat);
			return new;
		}
		else						//If number ends with 9 but doesnt have all 9's, the preceeding 9's are made 0 and non-9's are incremented
			x[n-2-s] = (int)x[n-2-s] + 1;
	}

	else
		x[n-1] = (int)x[n-1] + 1;		//If the number doesn't end with a 9. Normal increment
	
	a->data = removezeroes(x);
	return a;	
}

void* intal_decrement(void* temp)
{	
	int i;int s = 0;
	intal* a = (intal*)temp;
	if(a==NULL)
		return NULL;
	int n = a->length;
	char* x = (char*)a->data;
	if(x[n-1] == '0')						 
	{										//If the number ends with zero, replace the
		x[n-1] = '9';						//last digit with 9 and all preceeding 0's with 9 until nonzero is encountered
		for(i=n-2;i>=0;i--)
		{
			if(x[i] == '0')
				{
					x[i] = '9';
					s++;
				} 
			else
				break;
		}
		x[n-2-s] = (int)x[n-2-s] - 1;		//Decrementing the first nonzero
	}
	else
		x[n-1] =(int)x[n-1] - 1;			//Normal non-zero decrement
	
	a->data = removezeroes(x);
	return a;	
}

int intal_compare(void* intal1, void* intal2)
{
	intal* a = (intal*)intal1;
	intal* b = (intal*)intal2;

	if(a==NULL||b==NULL)
		return -2;
	
	char* p = removezeroes(a->data);
	char* q = removezeroes(b->data);

	int alen = strlen(p);
	int blen = strlen(q);
	
	int i,check;	
	
	if(alen>blen)					//If length of a is greater than length b. a>b
		return 1;
		
	else if(blen>alen)				//If length of b is greater than length of a. b>a
		return -1;
		
	else if(alen == blen)			//When lengths are equal
	{
		for(i=0;i<alen;i++)
		{
			if(p[i]>q[i])			//If i'th digit of P is greater than i'th digit of Q, P is greater
			{
				check = 0;
				return 1;
			}
			
			else if(q[i]>p[i])		//If i'th digit of Q is greater than i'th digit of P, Q is greater
			{
				check = 0;
				return -1;
			}
			
			else 					
			{						//Else if the digits are equal
				check = 1;
				continue;
			}
			
			if (check == 1)			//Reaching the unit place and all digits are equal
				return 0;
			
		}
	}
}

void* intal_add(void* intal1, void* intal2)
{
	intal* a = (intal*)intal1;
	intal* b = (intal*)intal2;

	if(a==NULL||b==NULL)
		return NULL;
	
	char* p = removezeroes(a->data);
	char* q = removezeroes(b->data);

	int alen = strlen(p);
	int blen = strlen(q);
	
	int max,i;
	if(alen>blen)						//Computing max(intal1,intal2)
		max = alen;
	else if(blen>alen)
		max = blen;
	else
		max = alen;

	intal* new = (intal*)malloc(sizeof(intal));
	new->data = (char*)malloc(max+2);
	new->length = max + 1;	
	char *d = new->data;
	int sum,carry=0;
	
	if(alen<blen)							//If length of P is lesser than the length of Q, padding P with 0's
	{
		int n = blen-alen;
		char* array = (char*)malloc(max+1);
		for(i=0;i<max;i++)
		{
			array[i] = '0';	
		}
		
		for(i=blen-1;i>=n;i--)
		{
			array[i] = p[i-n];
		}
		//free(p);
		array[max] = '\0';
		p = array;
	}
	
	if(alen>blen)							//If length of P is greater than the length of Q, padding Q with 0's
	{
		int n = alen-blen;
		char* array = (char*)malloc(max+1);
		for(i=0;i<max;i++)
		{
			array[i] = '0';	
		}
		
		for(i=alen-1;i>=n;i--)
		{
			array[i] = q[i-n];
		}
		
		array[max] = '\0';
		q = array;

	}
	int count = 0;
	for(i=strlen(p)-1;i>=0;i--)
		{
			sum = ((p[i]-'0') + (q[i]-'0') + carry);
			if(sum>9)
			{
				carry = 1;
				d[i] = sum%10 + '0';
			}
			else
			{
				carry = 0;
				d[i] = sum + '0';
			}
			count++;
		}
		if(carry==1)
			{
				for(i=strlen(p)-1;i>=0;i--)  
				{
					d[i+1] = d[i]; 
				}
				count++;
				d[0] = '1';
			}
		d[count] = '\0';
	d = removezeroes(d);
	return new;	
}

void* intal_diff(void* intal1, void* intal2)
{
	intal* a = (intal*)intal1;
	intal* b = (intal*)intal2;

	if(a==NULL||b==NULL)
		return NULL;
	
	if(intal_compare(a,b) == -1)
	{
		intal* temp;
		temp = a;
		a = b;
		b = temp;
	}
	
	char* p = removezeroes(a->data);
	char* q = removezeroes(b->data);
	
	int alen = strlen(p);
	int blen = strlen(q);

	int max,i;
	if(alen>blen)
		max = alen;
	else if(blen>alen)
		max = blen;
	else
		max = alen;
	
	intal* new = (intal*)malloc(sizeof(intal));
	new->data = (char*)malloc(max+2);
	new->length = max + 1;	
	char *d = new->data;
	int diff;
	
	if(alen<blen)
	{
		int n = blen-alen;
		char* array = (char*)malloc(max);
		for(i=0;i<max;i++)
		{
			array[i] = '0';	
		}
		
		for(i=blen-1;i>=n;i--)
		{
			array[i] = p[i-n];
		}
	
		array[max] = '\0';
		p = array;
	}
	
	if(alen>blen)
	{
		int n = alen-blen;
		char* array = (char*)malloc(max);
		for(i=0;i<max;i++)
		{
			array[i] = '0';	
		}
		
		for(i=alen-1;i>=n;i--)
		{
			array[i] = q[i-n];
		}

		array[max] = '\0';
		q = array;
	}	
	
	char* fix = (char*)malloc(strlen(p)+1);
	strcpy(fix,p);
	
	for(i=strlen(p)-1;i>=0;i--)
		{
			if((fix[i]-'0')<(q[i]-'0'))
			{
				diff = (((fix[i]-'0')+10) - (q[i]-'0'));
				fix[i-1] = ((fix[i-1]-'0')-1)+'0';
				d[i] = diff%10 + '0';
			}
			else
			{
				diff = ((fix[i]-'0') - (q[i]-'0'));
				d[i] = diff + '0';
			}
			
		}
	new->data = removezeroes(d);
	return new;
	
}


int digitcount(long long int x)
{

    int count = 0;

    while(x != 0)
    {
        x /= 10;
        ++count;
    }

  	return count;

}

intal* multiplysmall(intal* a,intal* b)
{
	char* p = removezeroes(a->data);
	char* q = removezeroes(b->data);

	int n1 = strlen(p);
	int n2 = strlen(q);	

	intal* new = (intal*)malloc(sizeof(intal));
	new->data = (char*)malloc(n1+n2+1);
	new->length = n1 + n2;	
	char *d = new->data;

	int val = atoi(p) * atoi(q);
		int c = digitcount(val);
		int i;
		for(i=c-1;i>=0;i--)
		{	
			d[i] = val%10 + '0';
			val = val/10;
		}
		d[c] = '\0';
		return new;

}

void* intal_multiply(void* intal1, void* intal2)
{
	int i,m;

	intal* a = (intal*)intal1;
	intal* b = (intal*)intal2;

	if(a==NULL||b==NULL)
		return NULL;
	
	char* p = removezeroes(a->data);
	char* q = removezeroes(b->data);

	int n1 = strlen(p);
	int n2 = strlen(q);	

	if(n1<10||n2<10){
		intal* x = multiplysmall(a,b);
		return x;}
else  
    {
	m = max(n1,n2);
	int m2 = m/2;
	
	intal *high1 = (intal*)malloc(sizeof(intal));
	high1->data = (char*)malloc(m2);
	high1->length = m2;
	char* h1 = high1->data;
	
	intal *low1 = (intal*)malloc(sizeof(intal));
	low1->data = (char*)malloc(n1-m2);
	low1->length = n1-m2;
	char* l1 = low1->data;
	
	intal *high2 = (intal*)malloc(sizeof(intal));
	high2->data = (char*)malloc(m2);
	high2->length = m2;
	char* h2 = high2->data;
	
	intal *low2 = (intal*)malloc(sizeof(intal));
	low2->data = (char*)malloc(n2-m2);
	low2->length = n2-m2;
	char* l2 = low2->data;
	
	for(i=0;i<m2;i++)
	{
		h1[i] = p[i];
		h2[i] = q[i];
	}
	h1[m2] = '\0';
	h2[m2] = '\0';

	for(i=0;i<m2;i++)
		l1[i] = p[i+m2];
	l1[m2] = '\0';
		
	for(i=0;i<m2;i++)
		l2[i] = q[i+m2];
	l2[m2] = '\0';

	char* z0s = intal_multiply(low1,low2);
	//printf("%s",z0s);
	char* z1s = intal_multiply(intal_add((void*)low1,(void*)high1),intal_add((void*)low2,(void*)high2));
	//printf("%s",z1s);
	char* z2s = intal_multiply(high1,high2);
	//printf("%s",z2s);

	long long int z0 = atoi(z0s);
	//printf("%lld",z0);
	long long int z1 = atoi(z1s);
	//printf("%lld",z1);
	long long int z2 = atoi(z2s);
	//printf("%lld",z2);

	intal* new = (intal*)malloc(sizeof(intal));
	new->data = (char*)malloc(n1+n2+1);
	new->length = n1 + n2;	
	char *d = new->data;
	
	int res = (z2*(pow(10,2*m2))+((z1-z2-z0)*pow(10,m2))+z0);
	int c = digitcount(res);
	for(i=c-1;i>=0;i--)
		{	
			d[i] = res%10 + '0';
			res = res/10;
		}
		return new;
	}
}

void* intal_divide(void* intal1, void* intal2)
{	
	intal *a = (intal*)intal1;
	intal *b = (intal*)intal2;

	if(a==NULL||b==NULL)
        return "NaN";

	char* number = a->data;
    char* divisor = b->data;
    
    if(divisor == "0")
        return NULL;

    if(divisor == "1")
        return a;
	
	intal *answer = (intal*)malloc(sizeof(intal));
    answer->data = (char*)malloc(sizeof(char)*a->length);
	char *ans = answer->data;

    int idx = 0;
    int temp = number[idx] - '0';
    while (temp < atoi(divisor))
       temp = temp * 10 + (number[++idx] - '0');
    
    while (a->length > idx)
    {
        ans += (temp / atoi(divisor)) + '0';
        temp = (temp % atoi(divisor)) * 10 + number[++idx] - '0';
    }
    
    if (answer->length == 0)
        return 0;
    
    return answer;
}

void* intal_pow(void* intal1, void* intal2)
{
    intal* a = (intal*)intal1;
    intal* b = (intal*)intal2;

    if(a==NULL||b==NULL)
       return NULL;
    
    if(intal2str(intal2) == "0")	
        return intal_create("1");
    
    char* p = removezeroes(a->data);
    char *q = removezeroes(b->data);

    if(p == "0")
        return 0;   

    intal* new = (intal*)malloc(sizeof(intal));
    new->data = "1";
    char *n = new->data;

    int i;
    for(i=0;i<atoi(q)-1;i++)
    {
        n = intal_multiply(new,intal_multiply(a,a));
    }
    return new;}
