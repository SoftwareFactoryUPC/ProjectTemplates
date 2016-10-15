package com.edu.upc.Service;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.edu.upc.Model.Alumno;
import com.edu.upc.Repository.AlumnoRepository;
import com.edu.upc.Repository.AlumnoRepositoryImpl;

@Service
public class AlumnoServiceImpl implements AlumnoService{

	
	@Autowired
	private AlumnoRepository repository;
	
	@Transactional
	public void Insertar(Alumno e) {
		// TODO Auto-generated method stub
		repository.save(e);
	}
	@Transactional
	public void Actualizar(Alumno e) {
		// TODO Auto-generated method stub
		repository.save(e);
	}
	@Transactional
	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		repository.delete(id);
	}
	@Transactional
	public Alumno ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub
		return repository.findOne(id);
	}
	@Transactional
	public List<Alumno> listar() {
		// TODO Auto-generated method stub
		return repository.findAll();
	}
	
	@Transactional
	public Alumno Login (String username, String password){	
		return repository.Login(username, password);
	}


}
