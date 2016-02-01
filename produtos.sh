
lista=`wp post list --url=http://rede.com.br/deepgeek/ --post_type="product" --field=ID` ;

count=1;
for i in $lista; 
	do
	# wp media import ~/Downloads/$count.png --url=http://rede.com.br/deepgeek/ --post_id=$i --title="A downloaded picture $count" --featured_image 

	 # wp post meta update  $i   _price "170" --url=http://rede.com.br/deepgeek/;
	 wp post meta update  $i   _featured "yes" --url=http://rede.com.br/deepgeek/;

	count=$(($count+1));
done

