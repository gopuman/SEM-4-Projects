void* intal_pow(void* var1, void* var2){

	intal *intal1 = (intal*)var1;
	intal *intal2 = (intal*)var2;
	intal *res=NULL;
	intal *res2=NULL;
	intal *res3=NULL;
	intal *two=NULL;
	intal *half=NULL;
	static int intal_pow_iter = 0;
	if(intal1==NULL || intal2==NULL)
		return NULL;
	if(intal2->length==1 && intal2->data[0]==0){
		res = (intal*)malloc(sizeof(intal));
		res->data = (char*)malloc(2);
		
		res->data[0] = 1;
		res->length = 1;
		return res;
	}

	two = (intal*)malloc(sizeof(intal));	// Creating the intal 2 
	two->data = (char*)malloc(1);
	
	two->data[0] = 2;
	two->length = 1;
	half = intal_divide(intal2, two);
	
	intal_pow_iter++;

	res = intal_pow((void*)intal1, (void*)half);
	res2 = intal_multiply((void*)res, (void*)res);
 
	if(intal2->data[0]%2==1){
		res3 = intal_multiply(res2, intal1);
	}
	// Destroying unnecessary variables
	intal_destroy(res);
	intal_destroy(two);
	intal_destroy(half);
	if(res3!=NULL){
		res = res3;
		intal_destroy(res2);
	}
	else{
		res = res2;
	}
	return res;

}
