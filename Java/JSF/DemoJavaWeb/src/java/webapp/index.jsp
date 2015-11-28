<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css"/>
<title>Bienvenido</title>
<%
		Boolean error = (Boolean)request.getAttribute("error");
    if(error==null){
    	error = false;
    }
%>
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
	          		   <a class="navbar-brand" >Demo Java Web</a>
	                    </div>  
              </nav>  
  </header>   

 <section>
            <div class="container-fluid" style="margin-top:50px;">   
                 <div class="row" >
                        <div class="col-md-12">
                          <div class="jumbotron">
                            <div class="col-md-7"> 
                             <form action="LoginServlet" method="post">
                               <div class="panel panel-primary">
                                    <div class="panel-heading">Login</div>
                                   <div class="panel-body">
                                    <div class="form-group">
                                     C&oacute;digo
                                     <input type="text" name="textCodigo" class="form-control" placeholder="e.g. Usuario1" required>
                                     Password
                                     <input type="password" name="textPassword" class="form-control" placeholder="e.g.******" required><br/>      
                                     <input type="submit" class="btn btn-primary" value="Ingresar"> 	                           
                                    </br>
                                    <%if(error){ %>
                                    <div class="alert alert-danger" role="alert">Codigo y/o Password incorrecto</div>
                                    <%}%>
                                    </div>     
                                   </div>
   
                               </div>
                               </form>
                              </div>
                          </div>
                        </div>
                 </div>
                 
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
<script type="text/javascript" src="Content/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Content/js/jquery-1.11.2.js"></script>
</html>