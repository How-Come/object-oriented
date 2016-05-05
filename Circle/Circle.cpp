#include "Circle.h"
#include<iostream>
using namespace std;
const double PI = 3.1415926; 

double calculate(double x)
{
	x = PI*x*x;
	return x;
}


int main()
{
	double radius;
	double area;
	cin >> radius;
	area = calculate(radius);
	cout << area << endl;
	return 0;
}
