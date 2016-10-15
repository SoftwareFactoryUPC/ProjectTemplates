package com.edu.upc.Repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import com.edu.upc.Model.Alumno;

public interface AlumnoRepository extends JpaRepository<Alumno, Integer> {

	 @Query("Select a from Alumno a WHERE a.codigo=:username AND a.password=:password")
	 Alumno Login(@Param("username")String username,@Param("password") String password);
	
}
