package com.edu.upc.Service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.edu.upc.Model.Curso;
import com.edu.upc.Repository.CursoRepositoryImpl;

@Service

public class CursoServiceImpl implements CursoService {

	@Autowired
	private CursoRepositoryImpl repository;
	
	@Transactional	
	public void Insertar(Curso e) {
		// TODO Auto-generated method stub
		repository.Insertar(e);
	}
	@Transactional
	public void Actualizar(Curso e) {
		// TODO Auto-generated method stub
		repository.Actualizar(e);		
	}
	@Transactional
	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		repository.Eliminar(id);
	}
	@Transactional
	public Curso ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub
		return repository.ObtenerPorId(id);
	}
	@Transactional
	public List<Curso> listar() {
		// TODO Auto-generated method stub
		return repository.listar();
	}

}
