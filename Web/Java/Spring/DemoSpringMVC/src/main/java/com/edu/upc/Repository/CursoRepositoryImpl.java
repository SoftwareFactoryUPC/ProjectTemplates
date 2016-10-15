package com.edu.upc.Repository;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import org.springframework.stereotype.Repository;

import com.edu.upc.Model.Curso;

@Repository
public class CursoRepositoryImpl implements CursoRepository {

	@PersistenceContext
	private EntityManager em;
		
	public void Insertar(Curso e) {
		// TODO Auto-generated method stub
		em.persist(e);
		em.flush();
	}

	public void Actualizar(Curso e) {
		// TODO Auto-generated method stub
		em.merge(e);
		em.flush();		
	}

	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		Curso curso = ObtenerPorId(id);
		em.remove(curso);
		em.flush();
	}

	public Curso ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub

		Curso curso;
		curso = em.find(Curso.class, id);
		return curso;
	}

	public List<Curso> listar() {
		// TODO Auto-generated method stub
		String sQuery = "from Curso";
		List<Curso> listaCurso = em.createQuery(sQuery).getResultList();		
				
		return listaCurso;
	}

}
