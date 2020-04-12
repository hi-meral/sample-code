<div class="index features">
	<h1>Features</h1>
	<p>
		<strong>CakeBattles</strong> is a full web application developed using <strong>CakePHP</strong> and 
		<strong>jQuery</strong> that allows battles to take place between contenders with users being able 
		to vote on who/what would win.
	</p>
	<p>
		<strong>CakeBattles</strong> has been developed to be as generic as possible so that the system can be used 
		for comparing pretty much anything. Each Contender can have multiple images associated with it which are 
		displayed at random to keeps things fresh and new.
	</p>
	<p>
		Each Contender also has multiple <strong>Tags</strong> which are used to categorise them and allow similar 
		Contenders to be pitted against each other more often. The system uses an algorithm to allow new Contenders to
		be chosen more frequently to combat any skew in the number of Battles.
	</p>


	<h2>CakePHP</h2>
		<p>
			This application has been developed using the wonderful <a href="http://www.cakephp.org" target="_blank">CakePHP</a>
			framework which is an MVC rapid development framework and its something I've been using for quite some time
			and my <a href="http://www.jamesfairhurst.co.uk" target="_blank">personal website</a> has quite a few technical 
			articles on how to use it.
		</p>

		<p>
			There are many advantages of using <strong>CakePHP</strong> and these include:
		</p>
		<ul>
			<li>Rapid development framework</li>
			<li>Code creation via the <em>Bake</em> command line script</li>
			<li>Great coding standards and conventions</li>
			<li>Lots of useful and built in classes to aid development</li>
		</ul>
		<p>
			Although the learning curve is quite steep for a complete beginner it is definately useful to have framework 
			knowledge in your arsenal. It will help you learn and grow as a developer and will help you get projects 
			done quickly in the future.
		</p>
		<p>
			<strong>CakeBattles</strong> serves as a strong example of a CakePHP project and can help you as a developer 
			learn how to create an application using the framework and can act as a base to launch your very own online 
			application.
		</p>

		<h3>Admin Section</h3>
		<p>
			<strong>CakeBattles</strong> features a password protected control panel that an administrator can use to 
			add/edit/delete Contenders, Contender Items and Tags. The control panel is the central access point to 
			administer the application and from here you are able to enable/disable user submitted Contenders.
		</p>
		
		<div class="gallery">
			<a href="./img/gallery/admin_login.jpg" class="thickbox"><img src="./img/gallery/admin_login_thumb.jpg" alt="CakeBattles Admin" /></a>
			<a href="./img/gallery/admin_contenders_index.jpg" class="thickbox"><img src="./img/gallery/admin_contenders_index_thumb.jpg" alt="CakeBattles Admin" /></a>
			<a href="./img/gallery/admin_contenders_add.jpg" class="thickbox"><img src="./img/gallery/admin_contenders_add_thumb.jpg" alt="CakeBattles Admin" /></a>
			<a href="./img/gallery/admin_contender_view.jpg" class="thickbox"><img src="./img/gallery/admin_contender_view_thumb.jpg" alt="CakeBattles Admin" /></a>
		</div>

		<h3>Data Validation</h3>
		<p>
			CakePHP has some great data validation features and <strong>CakeBattles</strong> uses these to validate data 
			from within the same Model and also validate data from another Model e.g. validate Contender Tags from the 
			"add Contender" page.
		</p>
		<p>
			Validation is tightly integrated into the Model file of each item and the Controller will automatically 
			validate when the data is being saved. Although on some occasions more complex validation is required and 
			this is displayed in the application and is fully commented in the code.
		</p>

		<h3>Associations</h3>
		<p>
			At the heart of any online application is a database that will lots of associations between the different 
			types of tables. CakePHP handles these associations very easily and <strong>CakeBattles</strong> utilises a 
			number of these for instance the <strong>hasMany</strong> and <strong>hasAndBelongsToMany</strong> associations.
		</p>
		<p>
			<strong>CakeBattles</strong> will provide a useful and detailed example of how to work with these associations 
			which you can then use and translate to other projects that your developing.
		</p>

		<h3>Components</h3>
		<p>
			CakePHP Components are reusable chunks of code that you use for multiple projects. <strong>CakeBattles</strong> 
			uses an upload component that you can use to upload files in your CakePHP applications.
		</p>

		<h3>Reusable Elements</h3>
		<p>
			A great feature of CakePHP are <a href="http://bakery.cakephp.org/articles/view/creating-reusable-elements-with-requestaction" target="_blank">Reusable Elements</a>
			which allow you to request controller data straight from your views and comes in extremely handy. For example the "Top 5" Contenders and "Top Tags"
			at the bottom of the page are using this functionality.
		</p>

		<h3>Fully Commented Code</h3>
		<p>
			All the Controller and Model files have been fully commented to allow you to learn and understand whats going on. 
			Being a developer there's nothing worse then seeing code and try to untangle whats going on, so I've tried to
			fully explain my code.
		</p>


	<h2>jQuery</h2>
		<p>
			<a href="http://www.jquery.org" target="_blank">jQuery</a> has been my framework of choice for some time now and
			I've used it in this project to accomplish a number of tasks. Probably one of the best and most used features is the
			ability to select dom elements using standard CSS selectors so if your not already using a framework be sure to 
			check it out.
		</p>

		<h3>Ajax</h3>
		<p>
			One of the first requirements I had for <strong>CakeBattles</strong> is to be able to vote without refreshing the
			page, I know that CakePHP has a lot of built in ajax functionality with the Prototype &amp; Script.aculo.us
			libraries but I wanted to stick with jQuery and it really straight forward to implement.
		</p>

		<p>
			Once a vote has been placed the link is intercepted and an ajax call it sent to the main Contenders Conroller
			to record the vote and to request another battle. On the Javascript side of things this is done in under 20 lines
			of code. Pretty impressive.
		</p>

		<h3>Table Striping &amp; Row Hover</h3>
		<p>
			Using jQuery its pretty easy to add 'even'/'odd' class names to your tables to save you the hassle of writing
			that in PHP. Added a 'hover' class is just as easy and adds a little user interaction to your tables.
		</p>

		<h3>Thickbox</h3>
		<p>
			<a href="http://jquery.com/demo/thickbox/">Thickbox</a> is a lightbox written in jQuery that is used to expand
			thumbnails to view full size images. It looks great and its extremely easy to implement so I've used it in
			<strong>CakeBattles</strong>.
		</p>

		<h3>Tooltips</h3>
		<p>
			When building online applications I like to give feedback &amp; information to the user as often as possible 
			and Tooltips are an excellent way of achieving this on forms. Using the excellent 
			<a href="http://bassistance.de/jquery-plugins/jquery-plugin-tooltip/" target="_blank">Tooltip Plugin</a> they
			were up and running in just a few minutes.
		</p>

		<h3>SWF Upload</h3>
		<p>
			<a href="http://swfupload.org/" target="_blank">SWFUpload</a> is a flash file uploader that allows a user
			to upload large files and get some feedback on the progress of the upload. This can be seen in action on the
			<a href="/contenders/add">Add Contender</a> page. The logic behind SWFUpload is a little tricky at
			first but soon fits into place after a while.
		</p>
		
</div>