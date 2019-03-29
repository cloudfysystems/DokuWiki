if(JSINFO.isauth == 1){
	/*Start of Tawk.to Script*/
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5bd1e463476c2f239ff5fa46/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
	/*End of Tawk.to Script*/
	//setando infos do usuario
	Tawk_API.onLoad = function(){
		Tawk_API.setAttributes({
			'branch' : JSINFO.user.branch,
			'name' : JSINFO.user.name,
			'email' : JSINFO.user.mail,
			'hash' : JSINFO.user.tawkHash
		}, function(error){});//callback do setAttribute
	};
}