	function checkrform(){//表单非空
		if(rform.name.value==""){
			alert("用户名不能为空!");
			rform.name.focus();
			return false;
		}

		if(rform.real_name.value==""){
			alert("真实姓名不能为空!");
			rform.real_name.focus();
			return false;
		}

		if(rform.password.value==""){
			alert("密码不能为空!");
			rform.password.focus();
			return false;
		}		

		if(rform.password.value!=rform.repwd.value){
			alert("两次密码不一致");
			rform.repwd.focus();
			return false;
		}

		if(rform.sex.value==""){
			alert("性别不能为空!");
			rform.sex.focus();
			return false;
		}

		if(rform.email.value==""){
			alert("邮箱不能为空!");
			rform.email.focus();
			return false;
		}

		if(rform.mobile.value==""){
			alert("手机不能为空!");
			rform.mobile.focus();
			return false;
		}

		if(rform.address.value==""){
			alert("地址不能为空!");
			rform.address.focus();
			return false;
		}

		

				
	}




