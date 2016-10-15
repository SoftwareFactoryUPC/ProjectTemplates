package com.upc.proyectos.musicstorerestws.rest;

import com.upc.proyectos.musicstoredb.entidades.Disco;
import com.upc.proyectos.musicstoredb.util.helper.DiscoHelper;
import java.util.ArrayList;
import javax.json.Json;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.FormParam;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;

@Path("disc")
public class DiscResource {

    private DiscoHelper helper;

    @Context
    private UriInfo context;

    public DiscResource() {
        helper = new DiscoHelper();
    }
    /*
     @GET
     @Produces("text/html")
     public String getHtml() {
     return "<h1>Get some REST!</h1>";
     }
     */

    /*
     @PUT
     @Consumes("text/html")
     public void putHtml(String content) {
     }
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Disco> listarDiscos() {
        return new ArrayList(helper.obtenListaDiscos());
    }

    @Path("/{id}")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Disco obtenerDisco(@PathParam("id") long idDisco) {
        return helper.obtenDisco(idDisco);
    }

    @Path("/insertar")
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.APPLICATION_JSON)
    public Disco insertarDisco(@FormParam("nombre") String nombre, @FormParam("autor") String autor) {
        Disco disco = new Disco(nombre, autor);
        return helper.guardaDisco(disco);
    }

    @Path("/actualizar")
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.APPLICATION_JSON)
    public Disco actualizarDisco(@FormParam("id") long id, @FormParam("nombre") String nombre, @FormParam("autor") String autor) {
        Disco disco = helper.obtenDisco(id);
        disco.setNombre(nombre);
        disco.setAutor(autor);
        return helper.actualizaDisco(disco);
    }

    @Path("/eliminar/{id}")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String eliminarDisco(@PathParam("id") long id) {
        Disco disco = helper.obtenDisco(id);
        if (disco == null) {
            return "{\"mensaje\":\"FAIL\"}";
        } else {
            helper.eliminaDisco(disco);
            return "{\"mensaje\":\"SUCCESS\"}";
        }
    }
}
