package com.upc.servlets;

import java.io.IOException;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.upc.dao.AlumnoDao;
import com.upc.dao.CursoDao;
import com.upc.entity.Alumno;
import com.upc.entity.Curso;

@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		   
		  String codigo = request.getParameter("textCodigo");
		  String password = request.getParameter("textPassword");
		  
		  AlumnoDao alumnoDao = AlumnoDao.obtenerAlumnoDao();
		  Alumno alumno = null;
		  
		  alumno = alumnoDao.obtenerPorCodigo(codigo);
		  
		  if(alumno!=null && alumno.getPassword().equals(password)){
			  
				  CursoDao cursoDao = CursoDao.obtenerCursoDao();
			  
			  List<Curso> listaCurso = cursoDao.listarPorAlumno(alumno.getIdAlumno());
			  
			  if(listaCurso!=null || !listaCurso.isEmpty()){  
				  alumno.setListaCursos(listaCurso);
			  }
			  
			  HttpSession session = request.getSession();			  
			  
			  session.setAttribute("alumno", alumno);
			  
			  response.sendRedirect("welcome.jsp");
		  }else{
			  request.setAttribute("error", true);
			  request.getRequestDispatcher("/index.jsp").forward(request, response); 
		  }
	}

}
