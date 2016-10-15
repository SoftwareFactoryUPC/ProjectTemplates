<%@page import="com.upc.entity.Alumno"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css"/>
<title>Bienvenido</title>
<%
	Alumno alumno = (Alumno)session.getAttribute("alumno");
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
	                       <ul class="nav navbar-nav navbar-right">
					        <li><a href="#"></a></li>
					        </ul>
              </nav>  
  </header>   

 <section>
            <div class="container-fluid" style="margin-top:50px;">   
                <div class="row">
                  <div class="col-md-3">
                                  <h2>C&oacute;digo de Alumno :<%=alumno.getCodigo()%></h2>
                  </div>
     
                </div>
                 <div class="row" >
                 
                     <h2>Cursos</h2>
                        <div class="col-md-12">
  						<table class="table table-striped">
 	  					<thead>
 	  					<th>Codigo</th>
 	  					<th>Nombre</th>
 	  					</thead>
 	  					<tbody>
 	  					<%for(int i=0;i<alumno.getListaCursos().size();i++){ %>
 	  					 <tr>
 	  					    <td><%=alumno.getListaCursos().get(i).getCodigo()%></td>
 	  					    <td><%=alumno.getListaCursos().get(i).getNombre()%></td> 	  					    
 	  					 </tr> 
 	  					<%}%>
 	  					</tbody>
 	  					
					    </table>
  				
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