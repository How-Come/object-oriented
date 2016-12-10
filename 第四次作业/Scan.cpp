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

		if (input[i]>='0' && input[i]<='9' || input[i]=='.')  //�ж��ǲ������ֻ�����С����
		{
			num += input[i];  //�����ֻ���С���㴢����������string��ʽ����ʹ���ֿ�������һ��
			count++ ;
			if (count > 10)
			{
				cout << "The num more than 10...Error" << endl;  //�����ֻ���С���㳬��ʮλʱ����
				num = "";
				m = 1;
				count = 0;
				break;  //�����壬����
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

	if (count != 0)  //�ж�ĩβ�ǲ�������
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

	return (QUEUE);  //����������Ƿ��ض��е�ֵ
};
