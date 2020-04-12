<h1>Mageno<br>
  <br>
</h1>
<pre>
getModel() - To create an instance of a Model class

	$Product = Mage::getModel(’catalog/product’);

getData() - To get relevant data from the object instance
	$product->getData("sku");

getSingleton() -  ensures a class has only one instance. So when you are using getSingleton you are calling 

already instantiated object
	Mage::getSingleton('checkout/cart')->getSummaryQty();

------

Access blocks content from .phtml template file by :
echo $this->getLayout()->createBlock("cms/block")
->setBlockId("static_block_id")->toHTML();

-----
Add js & css through xml


	skin_js
	js/ yourfile.js



	skin_js
	js/ yourfile.js



-----------

USE of addAttributeToFilter

$_products->addAttributeToFilter('status', array('eq' => 1));

----------

fetch all products

$products = Mage::getModel('catalog/product')->getCollection();

$products->addAttributeToSelect('name');
foreach($products as $product) {
	//do something
}

------------

Core query

$db = Mage::getSingleton('core/resource')->getConnection('core_write');
 
$result=$db->query("SELECT * FROM PCDSTable");


------------

Create new website

1. index - htaccess

create folder shoestore on root

	shoestore/index.php

	 change:	  $mageFilename = 'app/Mage.php';    with   $mageFilename = '../app/Mage.php';
	 change:	  Mage::run();  with  Mage::run('shoestore', 'website');

	shoestore/.htaccess

	change  "RewriteBase /"  (only if uncommented)

2 Manage Store

Admin > manage store > new website, new store, new view


3. Place Folders

put folder in 
app- design - forntend - default AND skin - frontend - default 


4. URL

System > configuration > general > web 

Unsecure: 
	Base URL  :  www.rootsite.com  (unchecked use defualt)
	Base Link URL : {{unsecure_base_url}}shoestore/ (unchecked use defualt)

Secure: 
	Base URL  :  www.rootsite.com (unchecked use defualt)
	Base Link URL : {{unsecure_base_url}}shoestore/ (unchecked use defualt)

5. Theme

	System > configuration > general > Design > Theme

	Templates : shoestore  (unchecked use defualt)
	Skin : shoestore  (unchecked use defualt)
	Layout : shoestore  (unchecked use defualt)
	Defualt : shoestore  (unchecked use defualt)

6. CMS pages

	Set up the CMS page(s)

</pre>


- magento design pattern

- which type of integration

- payment method

---------------------------------

- joomla coridore 

