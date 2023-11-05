
public class Plant extends Species {

	protected String lightDepedency;

	public Plant(String type, String name, String size, String habitat, String description, Integer survivability,
			String lightDepedency) {
		super(type, name, size, habitat, description, survivability);
		this.lightDepedency = lightDepedency;
	}

	public String getLightDepedency() {
		return lightDepedency;
	}

	public void setLightDepedency(String lightDepedency) {
		this.lightDepedency = lightDepedency;
	}

	@Override
	public int survavibility() {
		// TODO Auto-generated method stub
		int lightMod = 0;
		
		if(this.lightDepedency.equals("Yes")) {
			lightMod = 1;
		}
		if(this.lightDepedency.equals("No")) {
			lightMod = 4;
		}
		
		int sizeMod = 0;
		
		if(this.size.equals("Teeny")) {
			sizeMod = 7;
		}
		if(this.size.equals("Tall")) {
			sizeMod = 4;
		}
		if(this.size.equals("Titanic")) {
			sizeMod = 1;
		}
		
		return (100/28) * sizeMod * lightMod;
	}

}
