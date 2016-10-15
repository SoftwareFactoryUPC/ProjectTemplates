package com.edu.upc.ViewModel.Mapper;

import java.util.List;

import org.modelmapper.PropertyMap;

import com.edu.upc.Model.Alumno;
import com.edu.upc.Model.Curso;
import com.edu.upc.ViewModel.AlumnoViewModel;

public class AlumnoViewModelMapper extends PropertyMap<Alumno, AlumnoViewModel> {

	@Override
	protected void configure() {
		map().setIdAlumno(source.getIdAlumno());
		map().setCodigo(source.getCodigo());
		map().setPassword(source.getPassword());
		map().setBloqueado(source.getBloqueado());
		map().setNombreCursos(getNombreCursos(source.getListaCursos()));
	}
	
	
	private List<String> getNombreCursos(List<Curso> listCursos){
		
		//**** devuelve una lista de nombres de los cursos
		return null;
		
	}

}
