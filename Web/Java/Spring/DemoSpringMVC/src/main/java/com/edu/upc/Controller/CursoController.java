package com.edu.upc.Controller;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.validation.Valid;

import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

import com.edu.upc.Model.Carrera;
import com.edu.upc.Model.Curso;
import com.edu.upc.Model.Validators.CursoValidator;
import com.edu.upc.Service.CursoService;

@Controller
public class CursoController {

	
	 @Autowired
	 private CursoValidator validator;
	 
	 @Autowired
	 private CursoService service;
	
	 @RequestMapping(value={"/Curso/Create"},method = RequestMethod.GET) 
	   public String Create(Model model){
		   
		   Curso curso = new Curso();
		   
		   model.addAttribute("Curso",curso);
		   
		   return "Curso/create";
	   }
	   
	   @RequestMapping(value={"/Curso/Create"},method = RequestMethod.POST)
	   public String ActionCreate(@Valid @ModelAttribute("Curso")Curso curso,BindingResult bindingResult){
		   
		   validator.validate(curso, bindingResult);
		   
		   if(bindingResult.hasErrors())
			    return "Curso/create";
	
		   service.Insertar(curso);
		  
		   return "Curso/successful";
	   }
	   
	      @RequestMapping(value="/Curso/Listar",produces="application/json")
	   public @ResponseBody String listarCurso(){
		        
			       Map<Integer,String> listaCurso = ListCursoToMap(); 
			   
				   JSONObject mainJson = new JSONObject();
				   
				   JSONArray jsonArray = new JSONArray();
			       
					try {
						     for (Map.Entry<Integer, String> entry : listaCurso.entrySet())
							{
								       
								        JSONObject iterativeJson = new JSONObject();
								        iterativeJson.put("idcurso", entry.getKey());
								        iterativeJson.put("nombre", entry.getValue());   
								     
								        jsonArray.put(iterativeJson);
								   		
							}
						 	mainJson.put("carreras",jsonArray);
					} catch (Exception e) {
						
						e.printStackTrace();
					}
	     
		    	return mainJson.toString();
		  }
		  
	   private  Map<Integer,String> ListCursoToMap(){
	    	  
	    		 Map<Integer,String> mapCurso = new HashMap<Integer, String>();
	        	 
	        	 List<Curso> listaCurso = service.listar();
	        	 
	        	 for (Curso curso : listaCurso) {
	    			    {
	    			    	mapCurso.put(curso.getIdCurso(),curso.getCodigo()+" - "+curso.getNombre() );    	 
	    			    }
	    			  }
	        	 
	        	 return mapCurso;  	 
	      }
	      
}
