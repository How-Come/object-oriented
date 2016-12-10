#include "Calculation.h"

#include<iostream>
#include<stdlib.h>
#include<string.h>
#include<stack>
#include<sstream>
using namespace std;


double Calculation::Calculate(queue<string>QUEUE)
{
	stack<string>operat;  //运算符栈
	stack<string>number;  //操作数栈
	stack<double>value;  //记录计算结果

	string temp,p;//中间转换
	double a,b,c;  //用于stringstream转换中使用
	while(!QUEUE.empty())
	{
		temp = QUEUE.back();
		if(temp == ")")  //将QUEUE队列的中缀改成前缀 如果第一个为运算符")"，则直接压入栈中
		{
			operat.push(temp);
			QUEUE.pop();
		}
		else if(temp == "(")  //如果是"("，就要则依次弹出运算符栈顶的运算符，
		{
			for(;;)           //并压入操作数栈，直到遇到右括号为止，并将这一对括号删除
			{
				if(operat.top() == ")")
				{
					operat.pop();
					QUEUE.pop();
					break;
				}
				else
				{
					p = operat.top();  //否则，将运算符栈顶的运算符弹出并压入到操作数栈中
					number.push(p);      //再次与运算符栈中新的栈顶运算符相比较
					operat.pop();
				}
			}
		}
		else if(temp == "+" || temp == "-")
		{
			for(;;)
			{
				if(operat.empty() || operat.top() == ")" || operat.top() == "+" || operat.top() == "-")
				{
					operat.push(temp);  //若优先级比栈顶运算符的较高或相等，也将运算符压入运算符栈中
					QUEUE.pop();
					break;
				}
				else
				{
					p = operat.top();
					number.push(p);
					operat.pop();
				}
			}
		}
		else if(temp == "*" || temp == "/")
		{
			for(;;)
			{
				if(operat.empty() || operat.top() == ")" || operat.top() == "*" || operat.top() == "/" || operat.top() == "+" || operat.top() == "-")
				{
					operat.push(temp);  //通运算符为"+""-"的情况
					QUEUE.pop();
					break;
				}
				else
				{
					p = operat.top();
					number.push(p);
					operat.pop();
				}
			}
		}
		else  //运算符考虑完毕 如果是数字的话 直接用字符串连接 运算时直接弹出使用即可
		{
			number.push(temp);
			QUEUE.pop();
		}

		while(!operat.empty())  //把剩下的运算符压入操作数栈
		{
			p = operat.top();
			number.push(p);
			operat.pop();
		}

		while(!number.empty())
		{
			operat.push(number.top());
			number.pop();
		}

		while(!operat.empty())  //开始计算
		{
			temp = operat.top();
			if(temp == "+")
			{
				a = value.top();
				value.pop();
				b = value.top();
				value.pop();
				c = a+b;
				value.push(c);
				operat.pop();
			}
			else if(temp == "-")
			{
				a = value.top();
				value.pop();
				b = value.top();
				value.pop();
				c = a-b;
				value.push(c);
				operat.pop();
			}
			else if(temp == "*")
			{
				a = value.top();
				value.pop();
				b = value.top();
				value.pop();
				c = a*b;
				value.push(c);
				operat.pop();
			}
			else if(temp == "/")
			{
				a = value.top();
				value.pop();
				b = value.top();
				value.pop();
				c = a/b;
				value.push(c);
				operat.pop();
			}
			else
			{
				stringstream change;
				change << temp;
				change >> c;
				value.push(c);
				operat.pop();
			}
		}
	}
	
	double num = 0;
	num = value.top();
	value.pop();
	return num;
}
