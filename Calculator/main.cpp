#include "Scan.h"
#include "Print.h"
#include<iostream>
#include <stdlib.h>
#include <string>
#include <queue>

using namespace std;
int main()
{
	string target;
	queue<string>QUEUE;
	Scan INPUT;
	Print OUTPUT;
	cin >> target;
	QUEUE = INPUT.ToStringQueue(target);
	OUTPUT.print(QUEUE);
	return 0;
}

