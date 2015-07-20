// Services Slider Change Text

function changeTextAllServices(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">Services</h2><p class="p-vert-5">I provide a combination of top-notch web development services and cost effective prices that allow businesses both large and small to gain the competitive advantage necessary to succeed.</p><p><i>Click the icon below to learn more about my services</i></p><span class="hidden-xs glyphicon glyphicon-hand-down"></span>';}

function changeTextWebDesign(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">Web Design</h2><p class="p-vert-5">I\'ll help you through the process of customizing the layout and features to design a site suited to most effectively accomplish your goals.</p><p><i>Click the icon below to create the outline of your dream website.</i></p><span style="-ms-transform: rotate(66deg); -webkit-transform: rotate(66deg); transform: rotate(66deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("web-design").src="img/web-design.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

function changeTextWebDev(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">Web Development</h2><p class="p-vert-5">Open Mind Webs will help you to finally obtain your dream website. Tell me your ideas, and I\'ll bring them to life through coding.</p><p><i>Click the icon below to turn your imagination into reality.</i></p><span style="-ms-transform: rotate(54deg); -webkit-transform: rotate(54deg); transform: rotate(54deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("web-dev").src="img/web-development.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

function changeTextDbManagement(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">Database Management</h2><p class="p-vert-5">Are you overwhelmed with unorganized data that needs to be managed? I can organize your files and allow you and your customers to sift through them in a quick and orderly fashion.</p><p><i>Click the icon below to digitally organize your data.</i></p><span style="-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); transform: rotate(0deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("db-management").src="img/database-management.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

function changeTextSeo(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">SEO / Copywriting</h2><p class="p-vert-5">Get ahead of your competitors through SEO by capitalizing on keywords searches, improving your search engine rankings, and bringing in new website visitors.</p><p><i>Click the icon below to boost your website\'s visibility.</i></p><span style="-ms-transform: rotate(-54deg); -webkit-transform: rotate(-54deg); transform: rotate(-54deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("seo").src="img/seo.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

function changeTextEcommerce(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">E-commerce</h2><p class="p-vert-5">Create an online store and allow purchases on your website safely and securely. I can also assist with loading new products onto existing E-commerce sites and have experience working on the back-end of systems such as Target, Walmart, and Staples.</p><p><i>Click the icon below to monetize your products through the web.</i></p><span style="-ms-transform: rotate(-72deg); -webkit-transform: rotate(-72deg); transform: rotate(-72deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("ecommerce").src="img/e-commerce.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

function changeTextAnalytics(){
	document.getElementById('services').innerHTML = '<h2 class="services-title m-0">Analytics</h2><p class="p-vert-5">Obtain vital statistics and information about visitors to your website.</p><p><i>Click the icon below to gain access to key metrics.</i></p><span style="-ms-transform: rotate(-82deg); -webkit-transform: rotate(-82deg); transform: rotate(-82deg);" class="hidden-xs glyphicon glyphicon-hand-down"></span>';
	document.getElementById("analytics").src="img/analytics.png";
	document.getElementById("all-services").src="img/all-services-trans.png";
}

// Services slider - Change BG Color

function changeBgTan(){
	document.getElementById("services-container").style.background = "#f4c37d";
}

function changeBgOrange(){
	document.getElementById("services-container").style.background = "orange";
}

function changeBgSilver(){
	document.getElementById("services-container").style.background = "silver";
}

// Change Services Slider Icons Transparency

function changeWebDesignTrans(){
	document.getElementById("web-design").src="img/web-design-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

function changeWebDevTrans(){
	document.getElementById("web-dev").src="img/web-development-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

function changeDbManagementTrans(){
	document.getElementById("db-management").src="img/database-management-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

function changeSeoTrans(){
	document.getElementById("seo").src="img/seo-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

function changeEcommerceTrans(){
	document.getElementById("ecommerce").src="img/e-commerce-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

function changeAnalyticsTrans(){
	document.getElementById("analytics").src="img/analytics-trans.png";
	document.getElementById("all-services").src="img/all-services.png";
}

// Hide/Show Work Experience

function showWorkExperience(){
	document.getElementById("work-experience").style.display = "block";
	document.getElementById("work-experience-btn").style.display = "none";
}

// Services Hover Feature

function bgChange(id){
	document.getElementById(id).style.background = "tan";
	document.getElementById(id).style.color = "white";
}

function bgChangeBack(id){
	document.getElementById(id).style.background = "none";
	document.getElementById(id).style.color = "black";
}
