#include"Scan.h"
#include"Print.h"
#include"Calculation.h"
#include<iostream>
#include<stdlib.h>
#include<string.h>
#include<queue>
using namespace std;

int main(int argc, char *argv[]) //Çø±ð int main() 
{
	string target,target1;

	queue<string>que;
	Scan INPUT;
	Print OUTPUT;
	Calculation Calcul;
	cin >> target ;
	//target = argv[1];
	if(target == "-a")
	{
	//	target = argv[2];
		cin >> target;
		cout << target << "=";
	}
	que = INPUT.ToStringQueue(target);
	while(!que.empty())
	{
		cout << que.front() <<endl;
		que.pop();
	}
	//cout << Calcul.Calculate(que) << endl;
	return 0;
}

