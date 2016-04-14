#include "Scan.h"
#include<iostream>
#include<stdlib.h>
#include<string>
#include<queue>
using namespace std;

queue<string>Scan::ToStringQueue(string input)
{
	queue<string>QUEUE;
	string num ="";
	int count = 0;
	int m = 0, i=0;

	for (i=0; i<input.size(); i++)
	{

		if (input[i]>='0' && input[i]<='9' || input[i]=='.')  //判断是不是数字或者是小数点
		{
			num += input[i];  //将数字或者小数点储存起来，用string格式可以使数字可以连在一起
			count++ ;
			if (count > 10)
			{
				cout << "The num more than 10...Error" << endl;  //当数字或者小数点超过十位时报错
				num = "";
				m = 1;
				count = 0;
				break;  //无意义，返回
			}
		}

		else if (input[i] == '+' || input[i] == '-' || input[i] == '*' || input[i] == '/' || input[i] == '(' || input[i] == ')')
		{
			if (num != "")
			{
				QUEUE.push(num);
				num = "";
				count = 0;
			}
			num += input[i];
			QUEUE.push(num);
			num="";
		}

	}

	if (count != 0)  //判断末尾是不是数字
	{
		QUEUE.push(num);
		num = "";
		count = 0;
	}

	if (m == 1)
	{
		for (i=0; i<input.size(); i++)
		{
			QUEUE.pop();
		}
	}

	return (QUEUE);  //最后容易忘记返回队列的值
};
