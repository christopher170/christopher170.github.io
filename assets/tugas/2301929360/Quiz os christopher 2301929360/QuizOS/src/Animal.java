
public class Animal extends Species {

	protected Integer lifespan;

	public Animal(String type, String name, String size, String habitat, String description, Integer survivability,
			Integer lifespan) {
		super(type, name, size, habitat, description, survivability);
		this.lifespan = lifespan;
	}

	public Integer getLifespan() {
		return lifespan;
	}

	public void setLifespan(Integer lifespan) {
		this.lifespan = lifespan;
	}

	@Override
	public int survavibility() {
		// TODO Auto-generated method stub
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
		return (100/1050) * sizeMod * this.lifespan;
	}

}
