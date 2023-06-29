#include<stdio.h>
int main()
{
	char op;
	int a,b,sum,dif,pro;
	printf("enter the operand");
	scanf("%d%d",&a,&b);
    getchar();
	printf("enter the operator ");
	scanf("%c",&op);
	switch(op)
	{
		case '+':sum=a+b;
		         printf("%d",sum);
		         break;
		case '-':dif=a-b;
		         printf("%d",dif);
		         break;
		case '*':pro=a*b;
		         printf("%d",pro);
		         break;
		default:printf("invalid choice ");
	}
}