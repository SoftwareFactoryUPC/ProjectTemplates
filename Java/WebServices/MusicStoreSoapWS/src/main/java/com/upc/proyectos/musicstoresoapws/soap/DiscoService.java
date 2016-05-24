package com.upc.proyectos.musicstoresoapws.soap;

import com.upc.proyectos.musicstoredb.entidades.Disco;
import com.upc.proyectos.musicstoredb.util.helper.DiscoHelper;
import java.util.List;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

@WebService(serviceName = "DiscoService")
public class DiscoService {

    @WebMethod(operationName = "listar")
    public List<Disco> listarDiscos() {
        return new DiscoHelper().obtenListaDiscos();
    }

    @WebMethod(operationName = "obtener")
    public Disco obtenerDisco(@WebParam(name = "id") long id) {
        return new DiscoHelper().obtenDisco(id);
    }

    @WebMethod(operationName = "insertar")
    public Disco insertarDisco(@WebParam(name = "titulo") String titulo, @WebParam(name = "autor") String autor) {
        Disco disco = new Disco(titulo, autor);
        return new DiscoHelper().guardaDisco(disco);
    }

    @WebMethod(operationName = "actualizar")
    public Disco actualizarDisco(@WebParam(name = "id") long id, @WebParam(name = "nombre") String nombre, @WebParam(name = "autor") String autor) {
        DiscoHelper discoHelper = new DiscoHelper();
        Disco disco = discoHelper.obtenDisco(id);
        disco.setNombre(autor);
        disco.setAutor(autor);
        return discoHelper.actualizaDisco(disco);
    }

    @WebMethod(operationName = "borrar")
    public String borrrarDisco(@WebParam(name = "id") long id) {
        DiscoHelper discoHelper = new DiscoHelper();
        Disco disco = discoHelper.obtenDisco(id);
        if (disco != null) {
            discoHelper.eliminaDisco(disco);
        }
        return "Success!";
    }
}
