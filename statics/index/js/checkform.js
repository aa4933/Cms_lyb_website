<script language="javascript" type="text/javascript">
	function checkpost(){//表单非空
		if(myform.user.value==""){
			alert("用户姓名不能为空!");
			myform.username.focus();
			return false;
		}

		if(myform.pwd.value==""){
			alert("用户密码不能为空!");
			form.password.focus();
			return false;
		}		
				
		if(myform.email.value==""){
			alert("邮箱不能为空!");
			form.password.focus();
			return false;
		}
	}
</script>




通过onclick="return checkpost();"调用;