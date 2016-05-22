/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.upc.proyectos.scribejavademo;

import com.github.scribejava.apis.FacebookApi;
import com.github.scribejava.apis.GoogleApi20;
import com.github.scribejava.apis.LinkedInApi20;
import com.github.scribejava.apis.TwitterApi;
import com.github.scribejava.core.builder.ServiceBuilder;
import com.github.scribejava.core.model.OAuth1AccessToken;
import com.github.scribejava.core.model.OAuth1RequestToken;
import com.github.scribejava.core.model.OAuth2AccessToken;
import com.github.scribejava.core.model.OAuthRequest;
import com.github.scribejava.core.model.Response;
import com.github.scribejava.core.model.Verb;
import com.github.scribejava.core.oauth.OAuth10aService;
import com.github.scribejava.core.oauth.OAuth20Service;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONObject;

/**
 *
 * @author Roy
 */
@WebServlet(name = "ScribeJavaServlet", urlPatterns = {"/ScribeJavaServlet"})
public class ScribeJavaServlet extends HttpServlet {

    private String loginProvider;

    private OAuth10aService service10;
    private OAuth20Service service20;

    private OAuth1RequestToken requestToken;

    private OAuthRequest oauthRequest;
    private Response respuestaAPI;

    private OAuth1AccessToken accessToken1;
    private OAuth2AccessToken accessToken2;

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            if (request.getParameter("accion") != null) {
                String authURL = "http://localhost:8080/ScribeJavaDemo";
                if ("loginFb".equalsIgnoreCase(request.getParameter("accion"))) {
                    loginProvider = "Facebook";
                    service20 = new ServiceBuilder()
                            .apiKey("201803806879061")
                            .apiSecret("6cc1966c7ed62527dfccc580e7dc6b95")
                            .callback("http://localhost:8080/ScribeJavaDemo/ScribeJavaServlet")
                            .build(FacebookApi.instance());

                    authURL = service20.getAuthorizationUrl();
                } else if ("loginTwitter".equalsIgnoreCase(request.getParameter("accion"))) {
                    loginProvider = "Twitter";
                    service10 = new ServiceBuilder()
                            .apiKey("frB4Ap5vaDZ2IECXxBElXlpRv")
                            .apiSecret("6G3HONucjfNjWMyjr1vlHSpgNV2GWPCmSwZ1scmMKWrVYp6OrE")
                            .callback("http://localhost:8080/ScribeJavaDemo/ScribeJavaServlet")
                            .build(TwitterApi.instance());

                    requestToken = service10.getRequestToken();
                    authURL = service10.getAuthorizationUrl(requestToken);
                } else if ("loginGoogle".equalsIgnoreCase(request.getParameter("accion"))) {
                    loginProvider = "Google";
                    service20 = new ServiceBuilder()
                            .apiKey("803104469809-djkqqgh5e31aeb0ifotei46f8mve7q3j.apps.googleusercontent.com")
                            .apiSecret("kEM9427g8V5J_8zXmXhnke-_")
                            .callback("http://localhost:8080/ScribeJavaDemo/ScribeJavaServlet")
                            .scope("openid email profile")
                            .build(GoogleApi20.instance());

                    authURL = service20.getAuthorizationUrl();
                } else if ("loginLinkedIn".equalsIgnoreCase(request.getParameter("accion"))) {
                    loginProvider = "LinkedIn";
                    service20 = new ServiceBuilder()
                            .apiKey("7805y2q13pzk59")
                            .apiSecret("nle9uHcJzhyt71fN")
                            .callback("http://localhost:8080/ScribeJavaDemo/ScribeJavaServlet")
                            .build(LinkedInApi20.instance());

                    authURL = service20.getAuthorizationUrl();
                }
                System.out.println("URL: " + authURL);
                response.sendRedirect(authURL);
            } else {
                String code = request.getParameter("code");
                switch (loginProvider) {
                    case "Facebook":
                        accessToken2 = service20.getAccessToken(code);

                        oauthRequest = new OAuthRequest(Verb.GET, "https://graph.facebook.com/me?fields=id,name,email,age_range,birthday,gender,link,cover", service20);
                        service20.signRequest(accessToken2, oauthRequest);
                        break;
                    case "Twitter":
                        String verifier = request.getParameter("oauth_verifier");
                        accessToken1 = service10.getAccessToken(requestToken, verifier);

                        oauthRequest = new OAuthRequest(Verb.GET, "https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true", service10);
                        service10.signRequest(accessToken1, oauthRequest);
                        break;
                    case "Google":
                        accessToken2 = service20.getAccessToken(code);

                        oauthRequest = new OAuthRequest(Verb.GET, "https://www.googleapis.com/userinfo/v2/me", service20);
                        service20.signRequest(accessToken2, oauthRequest);
                        break;
                    case "LinkedIn":
                        accessToken2 = service20.getAccessToken(code);

                        oauthRequest = new OAuthRequest(Verb.GET, "https://api.linkedin.com/v1/people/~:(id,firstName,last-name,headline,picture-url,picture-urls::(original),siteStandardProfileRequest,public-profile-url,email-address)?format=json", service20);
                        service20.signRequest(accessToken2, oauthRequest);
                        break;
                }
                respuestaAPI = oauthRequest.send();
                System.out.println(respuestaAPI.getBody());
                escribir(response, respuestaAPI.getBody());
            }
        } catch (Exception ex) {
            response.sendRedirect("http://localhost:8080/ScribeJavaDemo");
        }
    }

    private void escribir(HttpServletResponse response, String responseText) throws IOException {
        JSONObject responseJSON = new JSONObject(responseText);

        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Usuario Autenticado</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Bienvenido</h1>");
            out.println("<p>A continuación se visualizará la información del usuario</p>");
            out.println("<h3>Información del usuario</h3>");
            out.println("<ul id='userInfo'>");
            String id = "";
            String nombre = "";
            String email = "";
            switch (loginProvider) {
                case "Facebook":
                    id = responseJSON.getString("id");
                    nombre = responseJSON.getString("name");
                    email = responseJSON.getString("email");
                    break;
                case "Twitter":
                    id = responseJSON.get("id").toString();
                    nombre = responseJSON.getString("name");
                    email = responseJSON.getString("email");
                    break;
                case "Google":
                    id = responseJSON.getString("id");
                    nombre = responseJSON.getString("name");
                    email = responseJSON.getString("email");
                    break;
                case "LinkedIn":
                    id = responseJSON.getString("id");
                    nombre = responseJSON.getString("firstName") + "" + responseJSON.getString("lastName");
                    email = responseJSON.getString("emailAddress");
                    break;
            }
            out.println("<li>ID: " + id + "</li>");
            out.println("<li>Nombre:  " + nombre + "</li>");
            out.println("<li>Email:  " + email + "</li>");
            out.println("</ul>");

            out.println("<h4>Foto de Perfil</h4>");
            String srcImage = "";
            switch (loginProvider) {
                case "Facebook":
                    //srcImage=responseJSON.getString("pictureUrl");
                    break;
                case "Twitter":
                    srcImage = responseJSON.getString("profile_image_url");
                    break;
                case "Google":
                    srcImage = responseJSON.getString("picture");
                    break;
                case "LinkedIn":
                    srcImage = responseJSON.getString("pictureUrl");
                    break;
            }

            out.println("<img id='userPhotoPerfil' src='" + srcImage + "'>");
            out.println("<h4>Respuesa JSON Completa</h4>");
            out.println("<p>" + responseJSON.toString() + "</p>");

            out.println("</body>");
            out.println("</html>");
        }
    }

    private void escribir2(HttpServletResponse response, String responseText) throws IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Usuario Autenticado</title>");
            out.println("</head>");
            out.println("<body>");
            out.println(responseText);
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
