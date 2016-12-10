#include "Calculation.h"

#include<iostream>
#include<stdlib.h>
#include<string.h>
#include<stack>
#include<sstream>
using namespace std;


double Calculation::Calculate(queue<string>QUEUE)
{
	stack<string>operat;  //�����ջ
	stack<string>number;  //������ջ
	stack<double>value;  //��¼������

	string temp,p;//�м�ת��
	double a,b,c;  //����stringstreamת����ʹ��
	while(!QUEUE.empty())
	{
		temp = QUEUE.back();
		if(temp == ")")  //��QUEUE���е���׺�ĳ�ǰ׺ �����һ��Ϊ�����")"����ֱ��ѹ��ջ��
		{
			operat.push(temp);
			QUEUE.pop();
		}
		else if(temp == "(")  //�����"("����Ҫ�����ε��������ջ�����������
		{
			for(;;)           //��ѹ�������ջ��ֱ������������Ϊֹ��������һ������ɾ��
			{
				if(operat.top() == ")")
				{
					operat.pop();
					QUEUE.pop();
					break;
				}
				else
				{
					p = operat.top();  //���򣬽������ջ���������������ѹ�뵽������ջ��
					number.push(p);      //�ٴ��������ջ���µ�ջ���������Ƚ�
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
					operat.push(temp);  //�����ȼ���ջ��������Ľϸ߻���ȣ�Ҳ�������ѹ�������ջ��
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
					operat.push(temp);  //ͨ�����Ϊ"+""-"�����
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
		else  //������������ ��������ֵĻ� ֱ�����ַ������� ����ʱֱ�ӵ���ʹ�ü���
		{
			number.push(temp);
			QUEUE.pop();
		}

		while(!operat.empty())  //��ʣ�µ������ѹ�������ջ
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

		while(!operat.empty())  //��ʼ����
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
