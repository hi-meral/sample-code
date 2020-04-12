<h3>Zend Interview Questions and Answers</h3>
<p>
<pre>
Zend

--------------------------------------------
ZEND

$this->getRequest()->getParams();
$this->getRequest()->getPost();

--------
disable layout?

$this->_helper->layout()->disableLayout();
$this->_helper->viewRenderer->setNoRender(true);

add css
$this->headLink()->appendStylesheet('filename.css'); 


add script
$this->view->headLink()->appendStylesheet('filename.css'); 

-------------

</pre>
<p><strong>Is Zend  Framework a component library or a framework?&nbsp;</strong><br />
  <br />
  ZF is both. Zend Framework provides all the components required for most web  applications in a single distribution. But Zend Framework components are also  loosely coupled, making it easy to use just a few components in a web  application- even alongside other frameworks! Using this use-at-will  architecture, we are implementing features commonly found in more monolithic  frameworks. In fact, we are currently working on a tooling component for the  1.8 release that will make it simpler to build applications using ZF  components, yet will not sacrifice the use-at-will nature of existing ZF  components.<br />
  <br />
  <strong>What is autoloader?</strong><br />
  Autoloader is function that load all the object on start up.&nbsp;<br />
  <br />
  <strong>What is use of Zend front controller?</strong><br />
  Routing and dispatching is managed in the front controller. It collects all the  request from the server and handles it.&nbsp;<br />
  <br />
  <strong>What is the use of Bootstrap?</strong><br />
  Apart from index if we want to do any extra configuration regarding database  and other things that is done within bootstrap.&nbsp;<br />
  <br />
<strong>How you can set Module name, Controller name, and Action name in Zend  framework?</strong></p>
<ul>
  <li>&nbsp;$request-&gt;setModuleName('front'); </li>
  <li>&nbsp;$request-&gt;setControllerName('address'); </li>
  <li>&nbsp;$request-&gt;setActionName('addresslist');&nbsp; </li>
</ul>
<p><br />
  <strong>Configuration in Zend Framework, application.ini file?</strong><br />
  Configuration can be done in application.ini file in Zend framework. This file  in the path application/configs/application.ini.&nbsp;<br />
  <br />
  <strong>Checking whether form posted or not in Zend framework?</strong><br />
  $request = $this-&gt;getRequest();<br />
  $getData = $request-&gt;getParams();<br />
  $postData = $request-&gt;getPost();&nbsp;<br />
  $isPost =  $request-&gt;isPost();<br />
  <br />
  <br />
  <strong>Fetch last inserted id, fetch all record,find and fetch a single record.</strong><br />
  $this-&gt;_db-&gt;lastInsertId();<br />
  $this-&gt;_db-&gt;fetchAll($sql);<br />
  $this-&gt;_db-&gt;find($id);<br />
  $this-&gt;_db-&gt;fetchRow($sql);&nbsp;<br />
  <br />
  <strong>Difference between Zend_Registry and Zend_Session?</strong><br />
  <br />
  Zend_Registry is used to store objects/values for the current request. In  short, anything that you commit to Registry in index.php can be accessed from  other controllers/actions (because EVERY request is first routed to the  index.php bootstrapper via the .htaccess file). Config parameters and db  parameters are generally prepped for global use using the Zend_Registry object.&nbsp;<br />
  <br />
  Zend_Session actually uses PHP sessions. Data stored using Zend_Session can be  accessed in different/all pages. So, if you want to create a variable named  'UserRole' in the /auth/login script and want it to be accessible in  /auth/redirect, you would use Zend_Session.&nbsp;<br />
  <br />
  <strong>When do we need to disable layout?</strong><br />
  At the time of calling AJAX  to fetch we need to disable layout.<br />
  $this-&gt;_helper-&gt;layout()-&gt;disableLayout();<br />
  $this-&gt;_helper-&gt;viewRenderer-&gt;setNoRender(true);&nbsp;<br />
  <br />
  <br />
  <strong>How to call two different views from same action?</strong><br />
  Example1:<br />
  Public function indexAction() {<br />
  If(condition)<br />
  $this-&gt;render('yourview.phtml');<br />
  Else<br />
  Index.phtml;&nbsp;<br />
  <br />
  Example2:<br />
  Public function indexAction() {<br />
  }<br />
  Now in your index.phtml you can have this statement to call other view<br />
  $this-&gt;action('action name','controller name','module name',array('parameter  name'=&gt;'parameter value'));&nbsp;<br />
  <br />
  <strong>Can we call a model in view?</strong><br />
  Yes, you can call a model in view. Simple create the object and call the  method.&nbsp;<br />
  $modelObj = new  Application_Model_User();<br />
  <br />
  <strong>Can we rename the application folder ?</strong><br />
  yes, we can<br />
  <br />
  <strong>Can we move the index.php file outside the public folder?</strong><br />
  yes, we can<br />
  <br />
  <strong>How to include js from controller and view in zend?</strong>&nbsp;<br />
  <br />
  From within a view file: $this-&gt;headScript()-&gt;appendFile('filename.js');&nbsp;<br />
  From within a controller: $this-&gt;view-&gt;headScript()-&gt;appendFile('filename.js');&nbsp;<br />
  And then somewhere in your layout you need to echo out your headScript object:&nbsp;<br />
  &lt;?=$this-&gt;headScript();?&gt;&nbsp;<br />
  <br />
  <br />
  <strong>How to include css from controller and view in zend?&nbsp;</strong><br />
  From within a view file: $this-&gt;headLink()-&gt;appendStylesheet('filename.css');&nbsp;<br />
  From within a controller:  $this-&gt;view-&gt;headLink()-&gt;appendStylesheet('filename.css');&nbsp;<br />
  And then somewhere in your layout you need to echo out your headLink object:&nbsp;<br />
  &lt;?=$this-&gt;headLink();?&gt;&nbsp;<br />
  <br />
  <strong>How do you protect your site from sql injection in zend when using select  query?&nbsp;</strong><br />
  <br />
  We have to quote the strings,<br />
  $this-&gt;getAdapter ()-&gt;quote ( &lt;variable name&gt; );<br />
  $select-&gt;where ( " &lt;field name&gt; = ", &lt;variable name&gt; );<br />
  OR (If you are using the question mark after equal to sign)<br />
  $select-&gt;where ( " &lt;field name&gt; = ? ", &lt;variable name&gt; );<br />
</p>
<br />
  //create a form object<br />
  $form = new Zend_Form<br />
  $form-&gt;setAction('/resource/process')<br />
  &nbsp; &nbsp; &nbsp;-&gt;setMethod('post');<br />
  <br />
  $form-&gt;setAttrib('id', 'login');<br />

<pre>//Form support Following elements</pre>
<pre>button,</pre>
<pre>checkbox (one/many),</pre>
<pre>hidden,</pre>
<pre>image,</pre>
<pre>password,</pre>
<pre>radio,</pre>
<pre>reset,</pre>
<pre>select (single select/many select),</pre>
<pre>submit,</pre>
<pre>text,</pre>
<pre>textarea</pre>

<pre> http://www.web-technology-experts-notes.in/2014/09/zend-framework-interview-questions-and-answers-for-experienced.html </pre>

<pre>
http://code.tutsplus.com/tutorials/5-helpful-tips-for-creating-secure-php-applications--net-2260  </pre>

<br><br>
http://php.net/manual/en/migration70.new-features.php