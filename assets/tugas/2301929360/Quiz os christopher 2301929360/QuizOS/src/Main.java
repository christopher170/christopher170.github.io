import java.util.Scanner;
import java.util.Vector;

public class Main {
	
	void printMenu() {
		System.out.println("CreaSim");
		System.out.println();
		int i = 0;
		do{
			System.out.print("=");
			i+=1;
		}while (i < 20);
		System.out.println();
		System.out.println("1. Create new species");
		System.out.println("2. Time Skip");
		System.out.println("3. Exit");
		System.out.print(">> ");
	}
	
	public Main() {
		// TODO Auto-generated constructor stub
		int input = 0;
		Scanner scan = new Scanner(System.in);
		Vector<Species> speciesVec = new Vector<Species>();
		
		do {
			printMenu();
			input = scan.nextInt();
			scan.nextLine();
			
			switch(input) {
				case 1:
					String type;
					String name;
					String size;
					String habitat;
					String description;
					Integer survivability;
					Integer lifespan;
					String lightDepedency;
					
					Species temp = null;
					
					do {
						System.out.print("Input species type [Animal | Plant]:");
						type = scan.nextLine();
					}while(!type.equals("Animal") && !type.equals("Plant"));
					
					do {
						System.out.print("Input species name [5..30]: ");
						name = scan.nextLine();
					}while(name.length()<5 || name.length()>30);
					
					do {
						System.out.print("Input species size [Teeny | Tall | Titanic]: ");
						size = scan.nextLine();
					}while(!size.equals("Teeny") && !size.equals("Tall") && !size.equals("Titanic"));
					
					do {
						System.out.print("Input species habitat [Land | Water | Air]: ");
						habitat = scan.nextLine();
					}while(!habitat.equals("Land") && !habitat.equals("Water") && !habitat.equals("Air"));
					
					do {
						System.out.print("Input species Description [1..30]: ");
						description = scan.nextLine();
					}while(description.length()<1 || description.length()>30);
					
					int sizeMod = 0;
					if(size.equals("Teeny")) {
						sizeMod = 7;
					}
					if(size.equals("Tall")) {
						sizeMod = 4;
					}
					if(size.equals("Titanic")) {
						sizeMod = 1;
					}
					
					
					if(type.equals("Animal")) {
						do {
							System.out.print("Input species Lifespan [1..150]: ");
							lifespan = scan.nextInt();
						}while(lifespan<1 || lifespan>150);
						
						survivability = (100/1050) * sizeMod * lifespan;
						temp = new Animal(type, name, size, habitat, description, survivability, lifespan);
					}
					if(type.equals("Plant")) {
						do {
							System.out.print("Input species light dependency[Yes | No]: ");
							lightDepedency = scan.nextLine();
						}while(!lightDepedency.equals("Yes") && !lightDepedency.equals("No"));
						
						int lightMod = 0;
						if(lightDepedency.equals("Yes")) {
							lightMod = 1;
						}
						if(lightDepedency.equals("No")) {
							lightMod = 4;
						}
						
						survivability = (100/28) * sizeMod * lightMod;
						temp = new Plant(type, name, size, habitat, description, survivability, lightDepedency);
					}
					
					speciesVec.add(temp);
				break;

				
				case 2:
					if(speciesVec.isEmpty()) {
						System.out.println("[!] There is no life on this planet!");
					}else {
						for (Species species : speciesVec) {
							System.out.printf("Species Name: %s\n", species.getName());
							System.out.printf("Size: %s\n", species.getSize());
							System.out.printf("Habitat: %s\n", species.getHabitat());
							System.out.printf("Description: %s\n", species.getDescription());
							if(species instanceof Animal) {
								Animal animal = (Animal) species;
								System.out.printf("Lifespan: %s\n", animal.getLifespan());
								System.out.printf("Needs Light: -\n");
							}else if(species instanceof Plant) {
								Plant plant = (Plant) species;
								System.out.printf("Lifespan: \n");
								System.out.printf("needs Light: %s\n", plant.getLightDepedency());
							}
							System.out.printf("Surv: %d\n", species.getSurvivability());
							System.out.println();
							System.out.println();
						}
					}
				break;
			}
			
		}while(input!=3);		
		
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new Main();
	}

}
