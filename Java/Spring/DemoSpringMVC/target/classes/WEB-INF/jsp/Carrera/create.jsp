<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="form" uri="http://www.springframework.org/tags/form" %>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" type="text/css" href="<c:url value="/content/css/bootstrap.min.css" />">   
    <link rel="stylesheet" type="text/css" href="<c:url value="/content/css/bootstrap-theme.min.css" />">
<title>Crear Carrera</title>

</head>
       <style>
           .jumbotron{
                      background:#337ab7; 
                      position: fixed;
                      width: 100%;
                      height: 90%; 
                      top:0;
                      left:0;
                      z-index: -1;
                      text-align: center;  
                      align-items: center;                
                      font-size: 150%;
           
           }
           .panel{
                       margin-top: 15%;
                       margin-left: 65%;
                       width: 40%;
           }
         .footer{
                      position: absolute;
                      bottom: 0;
                      width: 100%;
                      height: 10%;
                      background-color: #f5f5f5;  
            
                      text-align: center;
                      font-size: 150%;
         }
     
        </style> 

<body>
     
  <header class="container-fluid">
                <nav class="navbar navbar-inverse navbar-fixed-top">
	                   <div class="col-md-10">
	          		   <a class="navbar-brand" >Spring MVC</a>
	                    </div>  
              </nav>  
  </header>   

 <section>
          <div class="container-fluid" style="margin-top:50px;">   
                 <div class="row">
                  <div class="col-md-4">
         

                  </div>
     
                </div>
                <div class="row">
                   <div class="col-md-8">
                 	<h2>Carrera - Crear</h2>
                   </div>
                </div>
                
                
                <form:form commandName="Carrera" method="POST">


                 <div class="row" >
				   <div class="col-md-5">
                    <label>C&oacute;digo</label>
					</div>	
                 </div>
                 
                 <div class="row" >
				   <div class="col-md-5">
                    <form:input path="codigo" class="form-control"/>  
					</div>	
					
					 <div class="col-md-5">
                    <form:errors path="codigo"/>
					</div>	
                 </div>
                
                 <div class="row" >
				   <div class="col-md-5">
                    <label>Nombre</label>
					</div>	
                 </div>
                 
                 <div class="row" >
				   <div class="col-md-5">
                    <form:input path="nombre" class="form-control"/>  
					</div>	
					<div class="col-md-5">
                    <form:errors path="nombre"/>
					</div>	
                 </div>
				<br/>
                 <div class="row">
				   <div class="col-md-5">
                    <input type="submit" value="Registrar" class="btn btn-default"> 
					</div>	

                 </div>				  
             
                </form:form>
                
                     
                 
            </div>
        </section>
        <footer class="footer">
                <div class="container-fluid" >
                   <div class="row">
                     <div class="col-md-12">
                            Demo - Taller de Desempeño Profesional 
                        </div>
                </div>
  
            </div>  
        </footer>

</body>
<script type="text/javascript" src="<c:url value="content/js/bootstrap.min.js"/>"></script>
<script type="text/javascript" src="<c:url value="content/js/jquery-1.11.2.js"/>" ></script>
</html>