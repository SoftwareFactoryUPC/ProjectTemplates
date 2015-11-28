package com.edu.upc.Repository;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import org.springframework.stereotype.Repository;

import com.edu.upc.Model.Alumno;

@Repository
public class AlumnoRepositoryImpl  {

	/*
	@PersistenceContext
	private EntityManager em;
	
	public void Insertar(Alumno e) {
		// TODO Auto-generated method stub
		em.persist(e);
		em.flush();
		
	}

	public void Actualizar(Alumno e) {
		// TODO Auto-generated method stub
		em.merge(e);
		em.flush();
	}

	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		Alumno alumno = ObtenerPorId(id);
		em.remove(alumno);
		em.flush();
	}

	public Alumno ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub
		Alumno alumno;
		alumno = em.find(Alumno.class, id);
		return alumno;
	}

	public List<Alumno> listar() {
		// TODO Auto-generated method stub
		
		String sQuery = "from Alumno";
		List<Alumno> listaAlumno = em.createQuery(sQuery).getResultList();		
				
		return listaAlumno;
				
	}
    
	public Alumno Login(String username, String password){
		 Alumno alumno = null;
		 String sQuery = "from Alumno as alumno where alumno.codigo=:codigo and alumno.password= :password";
		
		 try{
		  Object obj =  em.createQuery(sQuery).setParameter("codigo",username)
											  .setParameter("password", password).getSingleResult();
		
		  if(obj!=null)
			    alumno = (Alumno)obj;
		 
		 }catch(Exception ex){
			 
		   ex.printStackTrace();
		   
		 }finally{
			 	return alumno;
		 }
		}
		*/
}
