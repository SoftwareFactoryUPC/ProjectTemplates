package com.edu.upc.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.edu.upc.Model.Alumno;
import com.edu.upc.Service.AlumnoService;
import com.edu.upc.ViewModel.AlumnoViewModel;
import com.edu.upc.ViewModel.Mapper.MapperViewModel;

@Controller
public class HomeController {
  
	   @Autowired
	   private AlumnoService alumnoService;

	   @RequestMapping(value = "/", method = RequestMethod.GET)
	   public String index(Model model){
		
		   AlumnoViewModel viewModel = new AlumnoViewModel();
		   
		   model.addAttribute("alumno",viewModel);
		   
		   return "Home/index";
	   }

	   @RequestMapping(value = "/", method = RequestMethod.POST)
	   public String login(Model model,@Validated @ModelAttribute("alumno")Alumno alumno,BindingResult bindingResult){
		     
		   Alumno nAlumno = alumnoService.Login(alumno.getCodigo(), alumno.getPassword());

		   if(nAlumno==null)
		   {    
			   bindingResult.reject("alumno", "Alumno y/o Password incorrectos");
			   return "Home/index";
		   }
		   
		    AlumnoViewModel viewModel = MapperViewModel.getInstance().map(alumno, AlumnoViewModel.class);
		   
		   model.addAttribute("alumno",viewModel);
		 
		   return "Home/welcome";
	   }
	   
}
