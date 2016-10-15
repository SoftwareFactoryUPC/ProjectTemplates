package com.edu.upc.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.edu.upc.Model.Alumno;
import com.edu.upc.Service.AlumnoService;
import com.edu.upc.ViewModel.AlumnoViewModel;
import com.edu.upc.ViewModel.Mapper.MapperViewModel;


@Controller
public class AlumnoController {

	@Autowired
	private AlumnoService service;
	
	@RequestMapping(value = {"/Alumno/Create"},method = RequestMethod.GET)
	public String Create(Model model){
		
		
		Alumno alumno = new Alumno();
			
		model.addAttribute("Alumno", alumno);
		
		return "Alumno/create";
	}
	
	@RequestMapping(value = {"/Alumno/Create"},method = RequestMethod.POST)
	public String ActionCreate(@ModelAttribute("Alumno")Alumno alumno,BindingResult bindingResult){
		
		if(bindingResult.hasErrors())
			return "Alumno/create";
		
		service.Insertar(alumno);
		
		return "redirect:/";
	}
	
}
