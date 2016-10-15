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
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

import com.edu.upc.Model.Carrera;
import com.edu.upc.Service.CarreraService;

@Controller
public class CarreraController {
  
  
	   @Autowired
	   private CarreraService service;
	
	   @RequestMapping(value={"/Carrera/Create"},method = RequestMethod.GET) 
	   public String Create(Model model){
		   
		   Carrera carrera = new Carrera();
		   
		   model.addAttribute("Carrera",carrera);
		   
		   return "Carrera/create";
	   }
	   
	   @RequestMapping(value={"/Carrera/Create"},method = RequestMethod.POST)
	   public String ActionCreate(@Valid @ModelAttribute("Carrera")Carrera carrera,BindingResult bindingResult){
		   
		   if(bindingResult.hasErrors())
			    return "Carrera/create";
		  
		   service.Insertar(carrera); 
		   
 		   return "Carrera/successful";
	   }
	
	      @RequestMapping(value="/Carrera/Listar",produces="application/json")
		  public @ResponseBody String listarCarrera(){
		        
			       Map<Integer,String> listaCarreras = ListCarreraToMap(); 
			   
				   JSONObject mainJson = new JSONObject();
				   
				   JSONArray jsonArray = new JSONArray();
			       
					try {
						     for (Map.Entry<Integer, String> entry : listaCarreras.entrySet())
							{
								       
								        JSONObject iterativeJson = new JSONObject();
								        iterativeJson.put("idcarrera", entry.getKey());
								        iterativeJson.put("name", entry.getValue());   
								     
								        jsonArray.put(iterativeJson);
								   		
							}
						 	mainJson.put("carreras",jsonArray);
					} catch (Exception e) {
						
						e.printStackTrace();
					}
	     
		    	return mainJson.toString();
		  }
		  
	   private  Map<Integer,String> ListCarreraToMap(){
	    	  
	    		 Map<Integer,String> mapCarrera = new HashMap<Integer, String>();
	        	 
	        	 List<Carrera> listaCarrera = service.listar();
	        	 
	        	 for (Carrera carrera : listaCarrera) {
	    			    {
	    			    	mapCarrera.put(carrera.getIdCarrera(),carrera.getCodigo()+" - "+carrera.getNombre() );    	 
	    			    }
	    			  }
	        	 
	        	 return mapCarrera;  	 
	      }
	      
}
