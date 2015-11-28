package com.edu.upc.Repository;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import org.springframework.stereotype.Repository;

import com.edu.upc.Model.Carrera;

@Repository
public class CarreraRepositoryImpl {

	/*
	@PersistenceContext
	private EntityManager em;
	
	public void Insertar(Carrera e) {
		// TODO Auto-generated method stub
		em.persist(e);
		em.flush();
	}	

	public void Actualizar(Carrera e) {
		// TODO Auto-generated method stub
		em.merge(e);
		em.flush();		
	}

	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		Carrera carrera = ObtenerPorId(id);
		em.remove(carrera);
		em.flush();
	}

	public Carrera ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub
		Carrera carrera;
		carrera = em.find(Carrera.class, id);
		return carrera;
		
	}

	public List<Carrera> listar() {
		// TODO Auto-generated method stub
		String sQuery = "from Carrera";
		List<Carrera> listaCarrera = em.createQuery(sQuery).getResultList();		
				
		return listaCarrera;
	}
*/
}
