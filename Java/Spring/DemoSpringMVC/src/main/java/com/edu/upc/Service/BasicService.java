package com.edu.upc.Service;

import java.util.List;

public interface BasicService <Entity,ID>{

	void Insertar(Entity e);
	void Actualizar(Entity e);
	void Eliminar(ID id);
	Entity ObtenerPorId(ID id);
	List<Entity> listar();
	
}
