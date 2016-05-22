#include<iostream>
#include<stdlib.h>
using namespace std;

struct Node
{
	int SelfAdd;
	int data;
	struct Node *next;
	struct Node *bef;
} ND[100020];

int main()
{
	Node *temp,*head,*p,*T,Nod;
	int Fadd,N,K,i,x,data,y;
	cin >> Fadd >> N >> K;

	i = N;
	while(i--)
	{
		cin >> x >> data >> y;
		ND[x].data = data;
		ND[x].SelfAdd = x;
		if(y != -1)
		{
			ND[x].next = &ND[y];
			ND[y].bef = &ND[x];
		}
		else
		{
			ND[x].next = NULL;
		}
	}
	head = &ND[Fadd];
	head->bef = NULL;
	p = head;
	int cnt = 0;
	T = &Nod;
	N = 0;
	while(p != NULL)
	{
		N++;
		p = p->next;
	}
	p = head;
	while(p != NULL && N>= K)
	{
		cnt++;
		if(cnt == K)
		{
			N -= cnt;
			temp = p;
			p = p->next;
			while(cnt-- && temp)
			{
				T->next = temp;
				T = T->next;
				temp = temp->bef;
			}
			cnt = 0;
		}
		else
		{
			p = p->next;
		}
	}
	while(p != NULL)
	{
		T->next = p;
		p = p->next;
		T = T->next;
	}
	T->next = NULL;
	p = &Nod;
	p = p->next;
	while(p != NULL)
	{
		if(p->next != NULL)
		{
			printf("%05d %d %05d\n",p->SelfAdd,p->data,p->next->SelfAdd);
		}
		else
		{
			printf("%05d %d %d\n",p->SelfAdd,p->data,-1);
		}
		p = p->next;
	}
	return 0;
}
