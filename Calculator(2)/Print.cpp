#include"Print.h"
#include<iostream>
#include<string>
#include<queue>
#include<stdlib.h>
using namespace std;

void Print::print(queue<string>QUEUE)
{
    int lenth=QUEUE.size();  //��ֹ���еĳ��Ȳ��ϱ仯��forѭ�����ִ���
	
	for(int i=0; i<lenth; i++)
	{
	    cout << QUEUE.front() << endl;
	    QUEUE.pop();
	}
	
};
