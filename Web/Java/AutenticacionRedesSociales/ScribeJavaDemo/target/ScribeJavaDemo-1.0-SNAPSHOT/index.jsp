<%-- 
    Document   : index
    Created on : 15/05/2016, 06:05:28 PM
    Author     : Roy
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Iniciar Sesión con redes sociales</h1>
        <table>
            <tr>
                <td>
                    <form id="formFb" action="ScribeJavaServlet" method="post">
                        <input type="hidden" value="loginFb" name="accion"/>
                        <input type="image" src="img/Facebook.png" alt="Submit Form" height="50" width="50" />
                    </form>
                </td>

                <td>
                    <form id="formTwitter" action="ScribeJavaServlet" method="post">
                        <input type="hidden" value="loginTwitter" name="accion"/>
                        <input type="image" src="img/Twitter.png" alt="Submit Form" height="50" width="60" />
                    </form>

                </td>

                <td>
                    <form id="formGoogle" action="ScribeJavaServlet" method="post">
                        <input type="hidden" value="loginGoogle" name="accion"/>
                        <input type="image" src="img/Google.png" alt="Submit Form" height="50" width="50" />
                    </form>

                </td>

                <td>
                    <form id="formLinked" action="ScribeJavaServlet" method="post">
                        <input type="hidden" value="loginLinkedIn" name="accion"/>
                        <input type="image" src="img/LinkedIn.png" alt="Submit Form" height="50" width="50" />
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
