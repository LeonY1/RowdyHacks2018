import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.URL;

public class Database{
	public static void main(String [] args){
		try{
			URL url = new URL("https://www.shopstyle.com/api/v2/products/?pid=uid5769-40809363-11");
			BufferedReader br = new BufferedReader(new InputStreamReader(url.openStream()));
			PrintStream out = new PrintStream("input.json");
			String str = "";
			while((str = br.readLine()) != null){
				out.println(str);
			}
		}catch(Exception e){
			e.printStackTrace();
		}
	}
}