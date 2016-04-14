#include"Scan.h"
#include"Print.h"
#include"Calculation.h"
#include<iostream>
#include<stdlib.h>
#include<string.h>
#include<queue>
using namespace std;

int main(int argc, char* argv[])  //命令行调用？？不是很懂。。。
{
	string target,target1;
	queue<string>QUEUE;

	Scan INPUT;
	Print OUTPUT;
	Calculation Calcul;

	cin >> target;
	if(target == "-a")
	{
		cin >> target1;
		cout << target1 << "=";
		INPUT.ToStringQueue(target1);
	}
	else
	{
		INPUT.ToStringQueue(target);
	}
	cout << Calcul.Calculate(INPUT.ToStringQueue(target)) << endl;
	return 0;
}

