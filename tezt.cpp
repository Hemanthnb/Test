#include<bits/stdc++.h>
using namespace std;
int leastCommonDescendent(int nodes[], int N, int node1, int node2){
  int *visited = new int [N];
  int cnt1 = 0; //used for counting length of path from node1 to node2
  int cnt2 = 0; //used for counting length of path from node2 to node1
  int mark = node1; //storing as a marker needed later for detecting end of search

  if(node1 == node2) return node2;
  for(int i = 0; i < N; i++){
    visited[i] = 0;
  }

  while((nodes[node1] != node1) && (nodes[node1] != -1) && (visited[node1] == 0) && (node1 != node2)){
    visited[node1]++;
    node1 = nodes[node1];
    cnt1++;
  }

  visited[node1]++; 

  while((nodes[node2] != node2) && (nodes[node2] != -1) && (visited[node2] != 2) && (node1 != node2)){
    visited[node2]++;
    node2 = nodes[node2];
    cnt2++;
  }
  if(node1 != node2) return -1;
  if ((nodes[node1] == -1) && (visited[node2] == 1)) return -1;
  if(nodes[node2] == -1) return -1;
  if(cnt1 > cnt2)
    return node2;
  else
    return mark;
}  
int main()
{
    // int T;
    // cin>>T;
    // int N,size;
    // for(int i=0;i<N;i++)
    // {
    // cin>>N;
    // }
    int arr[]={4 ,4, 1, 4 ,13, 8 ,8, 8, 0 ,8, 14, 9 ,15, 11 ,-1, 10, 15 ,22, 22, 22 ,22, 22 ,21};

    cout<<leastCommonDescendent(arr,23,9,2);
    return 0;
}
