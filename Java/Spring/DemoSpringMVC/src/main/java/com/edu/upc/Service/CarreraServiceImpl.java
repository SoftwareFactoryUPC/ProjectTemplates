package com.edu.upc.Service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.edu.upc.Model.Carrera;
import com.edu.upc.Repository.CarreraRepository;
import com.edu.upc.Repository.CarreraRepositoryImpl;

@Service
public class CarreraServiceImpl implements CarreraService {
	
	@Autowired
	private CarreraRepository repository;
 
	@Transactional
	public void Insertar(Carrera e) {
		// TODO Auto-generated method stub
		repository.save(e);
	}
	@Transactional
	public void Actualizar(Carrera e) {
		// TODO Auto-generated method stub
		repository.save(e);
	}
	@Transactional
	public void Eliminar(Integer id) {
		// TODO Auto-generated method stub
		repository.delete(id);
	}
	@Transactional
	public Carrera ObtenerPorId(Integer id) {
		// TODO Auto-generated method stub
		return repository.findOne(id);
	}
	@Transactional
	public List<Carrera> listar() {
		// TODO Auto-generated method stub
		return repository.findAll();
	}

}
