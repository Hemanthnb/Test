import java.util.*;
public class test
{
    public static int x;
    public static void main(String[] args) {
        int n=4;
        for(int i=0;i<n;i++)
        {
            for(int space =0;space<i;space++)
            {
                System.out.print(" ");
            }
            System.out.print(i+1);
            for(int j=0;j<=n-(2*i);j++)
            {
                System.out.print(" ");
            }
            if(i!=n-1)
            System.out.println(i+1);
        }
        System.out.println();
        x=1;
        for(int i=0;i<n-1;i++)
        {
            for(int j=0;j<n-i-2;j++)
            {
                System.out.print(" ");
            }
            System.out.print(n-i-1);
            for (int k = 0; k < (2*i)+1; k++) {
                System.out.print(" ");
            }
            System.out.println(n-i-1);
        }

    }
}