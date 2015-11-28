package com.edu.upc.Service;

import com.edu.upc.Model.Alumno;

public interface AlumnoService extends BasicService<Alumno, Integer> {

	 Alumno Login (String username, String password);
}
