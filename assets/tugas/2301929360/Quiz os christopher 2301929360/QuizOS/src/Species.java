
public abstract class Species {

	protected String type;
	protected String name;
	protected String size;
	protected String habitat;
	protected String description;
	protected Integer survivability;
	
	public Species(String type, String name, String size, String habitat, String description, Integer survivability) {
		super();
		this.type = type;
		this.name = name;
		this.size = size;
		this.habitat = habitat;
		this.description = description;
		this.survivability = survivability;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getSize() {
		return size;
	}

	public void setSize(String size) {
		this.size = size;
	}

	public String getHabitat() {
		return habitat;
	}

	public void setHabitat(String habitat) {
		this.habitat = habitat;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public Integer getSurvivability() {
		return survivability;
	}
	
	public void setSurvivability(Integer survivability) {
		this.survivability = survivability;
	}
	
	public abstract int survavibility();
	

}
