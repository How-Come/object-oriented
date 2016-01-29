#include<stdio.h>
int main()
{
	int a,b;
	int sum;
	scanf("%d %d",&a,&b);
	if(-1000000<=a<=1000000&&-1000000<=b<=1000000)
	{
		sum=a+b;
		if(sum<0)
		{
			printf("-");
			sum=-sum;
		}
		if(sum>=1000000)
		{
			printf("%d,%03d,%03d\n",sum/1000000,(sum/1000)%1000,sum%1000);
		}
		else if(sum>=1000)
		{
			printf("%d,%03d\n",sum/1000,sum%1000);
		}
		else
		{
			printf("%d\n",sum);
		}
	}
	else
	{
		printf("ERROR INPUT!");
	}
	return 0;	
}
