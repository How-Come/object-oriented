#include"Print.h"
#include<iostream>
#include<string>
#include<queue>
#include<stdlib.h>
using namespace std;

void Print::print(queue<string>QUEUE)
{
    int lenth=QUEUE.size();  //防止队列的长度不断变化，for循环出现错误
	
	for(int i=0; i<lenth; i++)
	{
	    cout << QUEUE.front() << endl;
	    QUEUE.pop();
	}
	
};
