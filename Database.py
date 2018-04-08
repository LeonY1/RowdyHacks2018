import urllib.request
import json

link = "http://api.shopstyle.com/api/v2/lists/search?pid=uid2681-40809291-31"
output = open('input.txt', 'w')
f = urllib.request.urlopen(link)
myfile = f.read()
print (myfile)

data_store = json.loads(myfile)
print(data_store["favorites"])

for item in data_store["favorites"]:
    product = item["product"]
    sql = "INSERT INTO ClothesTable (Category, Price, Brand, In Stock, Image, Link, Color, Size)"
    text = " VALUES("
    for category in product["categories"]:
        if(category["name"].lower().find("dress") != -1):
            text += "'Dress'"
            break
        if (category["name"].lower().find("shirt") != -1):
            text += "'Shirt'"
            break
        if (category["name"].lower().find("jacket") != -1):
            text += "'Dress'"
            break
        if (category["name"].lower().find("shoe") != -1):
            text += "'Shoes'"
            break
        if (category["name"].lower().find("pants") != -1):
            text += "'Pants'"
            break
    text += ", " + str(product["price"])
    text += ", '" + product["brand"]["name"] +"'"
    text += ", " + str(product["inStock"])
    text += ", '" + product["image"]["sizes"]["Large"]["url"] + "'"
    text += ", '" + product["clickUrl"] +"'"
    for stock in product["stock"]:
        temp_text = text;
        temp_text += ", '" + stock["color"]["name"] + "', " + stock["size"]["name"] + ")"
        temp_text = sql + temp_text + "\n"
        output.write(temp_text)
        print(sql + temp_text)
output.close()

